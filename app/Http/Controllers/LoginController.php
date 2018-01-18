<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PersonnelArea;
use App\Pegawai;

class LoginController extends Controller
{
    public function __construct()
    {
    	return $this->middleware('guest', ['except' => 'logout']);
    }

    public function index()
    {
    	if(auth()->check())
    	{
    		return redirect('/dashboard');
    	}

    	return view('pages.login');
    }

    public function login()
    {
    	$username = request('username');
    	$password = request('password');

		if (!auth()->attempt(['username' => $username, 'password' => $password]))
		{
			return back()->with('error', 'Username/password salah!');
		}
        
        $pegawai = Pegawai::where('nip', request('nip'))->first();
        if (!$pegawai || $pegawai->formasi_jabatan->personnel_area->username != $username) 
            return $this->logout('Anda tidak berhak login di unit lain');

        session(['nip_operator' => $pegawai->nip]);
	    return redirect('/dashboard')->with('success', 'Selamat bekerja!');
    }

    public function logout($message = NULL)
    {
    	auth()->logout();
        request()->session()->flush();
        
        if($message)
            return redirect('/login')->with('error', $message);

    	return redirect('/login');
    }
}
