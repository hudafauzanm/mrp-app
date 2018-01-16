<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Unit;
use App\MRP;

class StatusController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(Unit::class);
    }

    public function index()
    {
        $mrp = MRP::all();
        // $pegawai = Unit::class->get();
    	return view('pages.unit.status',compact('mrp'));
    }

    public function getDetails($reg_num)
    {
        $detail = MRP::all();
    	return view('pages.unit.detail_mutasi',compact('detail'));
    }
}
