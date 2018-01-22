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
            $ajumut = MRP::where('unit_pengusul', auth()->user()->id)->count();
            $dptmut = MRP::where('status', 1)->where('formasi_jabatan_id', $fj)->count();
    		return view('pages.unit.dashboard', compact('ajumut', 'dptmut', 'nip', 'nama'));
    	}
    	else if($user->user_role == 2)
    	{
    		return view('pages.karir2.dashboard');
    	}
    	else if($user->user_role == 3)
    	{
            $mrp_1 = MRP::where('status', 2)->where('tipe', 1)->get();
            $mrp_2 = MRP::where('status', 2)->where('tipe', 2)->get();
            $mrp_3 = MRP::where('status', 2)->where('tipe', 3)->get();
            $nilai = MRP::where('status', 2)->get();
    		return view('pages.sdm.dashboard', compact('mrp_1', 'mrp_2', 'mrp_3', 'nilai'));
    	}
    }
    public function getPenilaianPegawai()
    {
        $nilpegawai = PenilaianPegawai::select('creative', 'enthusiastic', 'building', 'strategic', 'customer', 'driving', 'visionary', 'empowering', 'komunikasi', 'team_work', 'bahasa_1_nilai', 'bahasa_2_nilai', 'bahasa_3_nilai')->where('pegawai_id', request('nip'))->first();
        //$user = auth()->user();
        
        return response()->json($nilpegawai);
    }
}
