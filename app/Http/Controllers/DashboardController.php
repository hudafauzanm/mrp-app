<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\PenilaianPegawai;
use App\MRP;

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
    		return view('pages.karir2.dashboard');
    	}
    	else if($user->user_role == 3)
    	{
            $mrp_1 = MRP::where('status', 2)->where('tipe', 1)->get();
            $mrp_2 = MRP::where('status', 1)->where('tipe', 2)->get();
            $mrp_3 = MRP::where('status', 1)->where('tipe', 3)->get();
            $nilai = MRP::where('status', 2)->get();

    		return view('pages.sdm.dashboard', compact('mrp_1', 'mrp_2', 'mrp_3', 'nilai'));
    	}
    }
    public function getPenilaianPegawai()
    {
        $nilpegawai = PenilaianPegawai::select('kesehatan', 'career_willingness', 'external_rediness', 'hubungan_sesama')->where('pegawai_id', request('pegawai'))->first();
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
        $mrp->no_dokumen_mutasi = request('no_dokumen_mutasi');
        $mrp->tgl_dokumen_mutasi = request('tgl_dokumen_mutasi');
        $mrp->status = 99;
        $mrp->save();

        $file = request('dokumen_mutasi');
        $foldername = $mrp->registry_number.'/';
        $filename = 'tolak_'.str_replace('/', '_', $mrp->no_dokumen_unit_asal).'.'.$file->getClientOriginalExtension();
        // dd($foldername, $filename);
        // $file->move(base_path(). '/storage/uploads/dok_asal/'.$foldername, $filename);
        $file->move(base_path(). '/public/storage/uploads/'.$foldername, $filename);

        return back()->with('success', 'Berhasil');
    }

    public function approveMutasi()
    {
        $this->validate(request(), [
            'dokumen_mutasi' => 'required|mimes:pdf|max:10240'
        ]);

        $mrp = MRP::find(request('id'));
        $mrp->no_dokumen_mutasi = request('no_dokumen_mutasi');
        $mrp->tgl_dokumen_mutasi = request('tgl_dokumen_mutasi');
        $mrp->status = 3;

        if($mrp->tipe == 3)
        {
            $mrp->pegawai_id = Pegawai::where('nip', request('nip'))->first()->id;
        }

        $mrp->save();

        $file = request('dokumen_mutasi');
        $foldername = $mrp->registry_number.'/';
        $filename = 'terima_'.str_replace('/', '_', $mrp->no_dokumen_unit_asal).'.'.$file->getClientOriginalExtension();
        // dd($foldername, $filename);
        // $file->move(base_path(). '/storage/uploads/dok_asal/'.$foldername, $filename);
        $file->move(base_path(). '/public/storage/uploads/'.$foldername, $filename);

        return back()->with('success', 'Berhasil');
    }
}
