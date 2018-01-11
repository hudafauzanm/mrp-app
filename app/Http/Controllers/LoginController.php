<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PersonnelArea;

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
		
	    return redirect('/dashboard')->with('success', 'Selamat bekerja!');
    }

    public function logout()
    {
    	auth()->logout();
        request()->session()->flush();

    	return redirect('/login')->with('success', 'Berhasil log out');
    }
}
