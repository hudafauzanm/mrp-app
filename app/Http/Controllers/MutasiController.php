<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Unit;
use Carbon\Carbon;

use App\Pegawai;

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
        
        if($pegawai)
        {
            $fj = $pegawai->formasi_jabatan;
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
        
    }
}
