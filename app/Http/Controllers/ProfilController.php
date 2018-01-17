<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonnelArea;

class ProfilController extends Controller
{
    public function __construct ()
    {
    	return $this->middleware('auth');
    }

    public function index()
    {
    	return view('pages.editprofil');
    }

    public function store()
    {
    	$personnelarea = auth()->user();

    	return view('pages.editprofil', compact('personnelarea')); 
    }

    public function input(Request $request)
    {
    	$this->validate($request,
    		['password' => 'confirmed',
    		'alamat' => 'required',
    		'provinsi' => 'required',
    		'kota' => 'required'
    	]);

    	$personelarea = auth()->user();
    	$personelarea->alamat=$request->input('alamat');
    	$personelarea->provinsi=$request->input('provinsi');
    	$personelarea->kota=$request->input('kota');
    		if ($request->input('password'))
    			$personelarea->password=bcrypt($request->input('password'));
    	$personelarea->save(); 

    	return redirect('/profil')->with('success','Berhasil Update Profil');
    } 
}
}
