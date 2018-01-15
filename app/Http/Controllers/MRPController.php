<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\SDM;

class MRPController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(SDM::class);
    }

    public function index()
    {
    	return view('pages.sdm.mrp');
    }

    public function showEdit()
    {
    	return view('pages.sdm.mrp_edit');
    }
}
