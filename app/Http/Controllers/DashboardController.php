<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

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
    		return view('pages.unit.dashboard');
    	}
    	else if($user->user_role == 2)
    	{
    		return view('pages.karir2.dashboard');
    	}
    	else if($user->user_role == 3)
    	{
    		return view('pages.sdm.dashboard');
    	}
    }
}
