<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Unit;

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

    public function getInfoPegawai()
    {
        // return response()->json();
    }
}
