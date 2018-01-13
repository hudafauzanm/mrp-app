<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
    	return $this->middleware('auth');
    }

    public function index()
    {
    	return view('pages.unit.status');
    }

    public function getDetails($reg_num)
    {
    	return view('pages.unit.detail_mutasi');
    }
}
