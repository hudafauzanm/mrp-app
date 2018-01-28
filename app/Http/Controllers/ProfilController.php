<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonnelArea;
use App\Kota;
use App\Provinsi;

class ProfilController extends Controller
{
    public function __construct ()
    {
    	return $this->middleware('auth');
    }

    public function index()
    {
    	$personnelarea = auth()->user();
    	$provinsis = Provinsi::all();
    	$selectedprovinsi = $personnelarea->provinsi;
    	if ($personnelarea->provinsi)
    		{
		    		$kotas=Kota::where('provinsi_id',$personnelarea->provinsi)->get();
		    	}
		    	else
		    	{
		    		$kotas=NULL;
    		}
    	$selectedkota = $personnelarea->kota;

    	return view('pages.editprofil',compact('personnelarea','provinsis','selectedprovinsi','selectedkota','kotas'));
    }

    public function getKota()
    {
    	$kotas = Kota::where('provinsi_id',request('provinsi_id'))->get();

    		return response()->json($kotas);
    	
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
