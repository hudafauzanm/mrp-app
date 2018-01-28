<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\PenilaianPegawai;
use App\MRP;
use App\PersonnelArea;

use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

use App\Notifications\MutasiDitolak;
use App\Notifications\ProsesEvaluasi;
use App\Notifications\ButuhEvaluasi;

class DashboardController extends Controller
{
    public function __construct()
    {
    	return $this->middleware('auth');
    }

    public function index()
    {
    	$user = auth()->user();
    	
    	if($user->user_role == 1)
    	{
            $nip = request()->session()->get('nip_operator');
            $nama = Pegawai::where('nip', $nip)->get();
            $fj = auth()->user()->formasi_jabatan->pluck('id')->toArray(); 
            $ajumut = MRP::where('tipe', 2)->where('unit_pengusul', auth()->user()->id)->count();
            $ajumutj = MRP::where('tipe', 3)->where('unit_pengusul', auth()->user()->id)->count();
            $dptmut = MRP::where('status', 1)->where('formasi_jabatan_id', $fj)->count();
    		return view('pages.unit.dashboard', compact('ajumutj','ajumut', 'dptmut', 'nip', 'nama'));
    	}
    	else if($user->user_role == 2)
    	{            
            $mrp_e = MRP::where('status', 3)->get();
    		return view('pages.karir2.dashboard', compact('mrp_e'));
    	}
    	else if($user->user_role == 3)
    	{
            $mrp_1 = MRP::where('status', 2)->where('tipe', 1)->get();
            $mrp_2 = MRP::where('tipe', 2)->whereIn('status', [1,2,97])->get(); #kalo ada jawaban ntar ditampilin
            $mrp_3 = MRP::where('status', 1)->where('tipe', 3)->get();
            $nilai = MRP::where('status', 2)->get();

    		return view('pages.sdm.dashboard', compact('mrp_1', 'mrp_2', 'mrp_3', 'nilai'));
    	}
    }
    public function getPenilaianPegawai()
    {
        $nilpegawai = PenilaianPegawai::select('kesehatan', 'career_willingness', 'external_rediness', 'hubungan_sesama', 'hubungan_atasan')->where('pegawai_id', request('pegawai'))->first();
        $nilpegawai->bintang = PenilaianPegawai::select('creative', 'enthusiastic', 'building', 'strategic', 'customer', 'driving', 'visionary', 'empowering', 'komunikasi', 'team_work', 'bahasa_1_nilai', 'bahasa_2_nilai', 'bahasa_3_nilai')->where('pegawai_id', request('pegawai'))->first();
        //$user = auth()->user();
        
        return response()->json($nilpegawai);
    }

    public function rejectMutasi()
    {
        $this->validate(request(), [
            'dokumen_mutasi' => 'required|mimes:pdf|max:10240'
        ]);

        $mrp = MRP::find(request('id'));
        $mrp->no_dokumen_respon_sdm = request('no_dokumen_respon_sdm');
        $mrp->tgl_evaluasi = Carbon::now('Asia/Jakarta');
        $mrp->tindak_lanjut = 'BATAL';
        $mrp->status = 99;

        $file = request('dokumen_mutasi');
        $foldername = $mrp->registry_number.'/';
        $filename = 'TOLAK_'.str_replace('/', '_', $mrp->no_dokumen_respon_sdm).'.'.$file->getClientOriginalExtension();
        $mrp->filename_dokumen_respon_sdm = $filename;
        // dd($foldername, $filename);
        // $file->move(base_path(). '/storage/uploads/dok_asal/'.$foldername, $filename);
        $mrp->save();
        $file->move(base_path(). '/public/storage/uploads/'.$foldername, $filename);
        $pengusul = $mrp->personnel_area_pengusul;
        $data = [
            'reg_num' => $mrp->registry_number,
            'penolak' => 'SDM Kantor Pusat',
            'user_id' => $pengusul->id,
            'mrp_id' => $mrp->id
        ];
        $pengusul->notify(new MutasiDitolak($data));

        return back()->with('success', 'Berhasil');
    }

    public function approveMutasi()
    {
        $this->validate(request(), [
            'dokumen_mutasi' => 'required|mimes:pdf|max:10240'
        ]);

        $mrp = MRP::find(request('id'));
        $mrp->no_dokumen_respon_sdm = request('no_dokumen_respon_sdm');
        $mrp->tgl_evaluasi = Carbon::now('Asia/Jakarta');
        $mrp->tindak_lanjut = request('tindak_lanjut');
        $mrp->status = 3;

        if($mrp->tipe == 3)
        {
            $mrp->pegawai_id = Pegawai::where('nip', request('nip'))->first()->id;
        }


        $file = request('dokumen_mutasi');
        $foldername = $mrp->registry_number.'/';
        $filename = 'TERIMA_'.str_replace('/', '_', $mrp->no_dokumen_respon_sdm).'.'.$file->getClientOriginalExtension();
        $mrp->filename_dokumen_respon_sdm = $filename;
        // dd($foldername, $filename);
        // $file->move(base_path(). '/storage/uploads/dok_asal/'.$foldername, $filename);
        $mrp->save();
        $file->move(base_path(). '/public/storage/uploads/'.$foldername, $filename);
        $pengusul = $mrp->personnel_area_pengusul;
        $data = [
            'reg_num' => $mrp->registry_number,
            'user_id' => $pengusul->id,
            'mrp_id' => $mrp->id
        ];
        $pengusul->notify(new ProsesEvaluasi($data));

        $karir2 = PersonnelArea::where('user_role', 2)->first();
        $data = [
            'reg_num' => $mrp->registry_number,
            'tipe' => $mrp->tipe,
            'user_id' => $pengusul->id,
            'mrp_id' => $mrp->id
        ];
        $karir2->notify(new ButuhEvaluasi($data));

        return back()->with('success', 'Berhasil');
    }
    public function detaileval()
    {
        $mrp_e1 = MRP::where('status', 3)->get();
        $filename = 'Data Evaluasi - '.Carbon::now('Asia/Jakarta');

        Excel::create($filename, function($excel) use($mrp_e1) {
            $excel->sheet('Data Evaluasi', function($sheet) use($mrp_e1) {
                $sheet->loadView('pages.karir2.dataevaluasi', ['mrp_e1' => $mrp_e1, 'no' => 1]);
                $sheet->getStyle('B:J')->getAlignment()->setWrapText(true);
                $sheet->cell('A1:J1', function($cell) { 
                    $cell->setFontSize(10);
                });

            });
        })->download('xlsx');
    }
}
