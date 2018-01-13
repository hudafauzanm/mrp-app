<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
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
}
