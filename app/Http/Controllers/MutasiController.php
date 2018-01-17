<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Unit;
use Carbon\Carbon;
use Uuid;

use App\MRP;
use App\Pegawai;
use App\PenilaianPegawai;

class MutasiController extends Controller
{
    public function __construct()
    {
    	$this->middleware(Unit::class);
    }

    public function index()
    {
    	$tipe = request('tipe');

    	if($tipe === '1')
    	{
    		return view('pages.unit.meminta');
    	}
    	else if($tipe === '2')
    	{
    		return view('pages.unit.bursa_pegawai');
    	}
    	else if($tipe === '3')
    	{
    		return view('pages.unit.request_jabatan');
    	}
    	else
    	{
    		return abort(404);
    	}
    }

    public function getPegawaiInfo()
    {
        $pegawai = Pegawai::where('nip', request('nip'))->first();
        $user = auth()->user();
        
        if($pegawai)
        {
            $fj = $pegawai->formasi_jabatan;
            if($fj->personnel_area->id != $user->id)
                return response()->json(NULL);
            
            $pegawai->forja = $fj->formasi.' '.$fj->jabatan;
            $pegawai->posisi = $fj->posisi;
            $pegawai->personnel_area = $fj->personnel_area->nama;
            $pegawai->masa_kerja = $pegawai->time_diff(Carbon::parse($pegawai->tanggal_jab_unit_akhir), Carbon::now('Asia/Jakarta'));
            $pegawai->sisa_masa_kerja = $pegawai->time_diff(Carbon::now('Asia/Jakarta'), Carbon::parse($pegawai->end_date));
        }

        return response()->json($pegawai);
    }

    public function submitForm()
    {
        $tipe = request('mrp')['tipe'];
        $nip = request('nip');

        if($tipe === '2')
        {
            $pegawai_id = Pegawai::where('nip', $nip)->first()->id;
            $tambahan_mrp = array(
                'id' => Uuid::generate(),
                'registry_number' => $nip.'.'.request('mrp')["mutasi"][0].'.'.\Carbon\Carbon::now('Asia/Jakarta'),
                'status' => 1,
                'nip_operator' => request()->session()->get('nip_operator'),
                'unit_pengusul' => auth()->user()->id,
                'pegawai_id' => $pegawai_id,
            );

            $data_mrp = array_merge($tambahan_mrp, request('mrp'));
            $data_nilai = array_merge(request('nilai'), array('pegawai_id' => $pegawai_id));
            // dd($data_mrp, $data_nilai);

            $mrp = MRP::create($data_mrp);
            $nilai = PenilaianPegawai::create($data_nilai);

            $file = request('file_dokumen_mutasi');
            $foldername = $mrp->registry_number.'/';
            $filename = $mrp->no_dokumen_unit_asal.'.'.$file->getClientOriginalExtension();
            // dd($foldername, $filename);
            $file->move(base_path(). '/storage/uploads/dok_asal/'.$foldername, $filename);

            return redirect('/dashboard')->with('success', 'Pegawai berhasil dibursakan');
        }
    }
}
