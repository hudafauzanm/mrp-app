<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
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
            $mrp = MRP::where('status', 2)->get();
    		return view('pages.sdm.dashboard', compact('mrp'));
    	}
    }
}
