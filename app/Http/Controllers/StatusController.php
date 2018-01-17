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
        $statusbase = ['formasi_jabatan_id->formasi_jabatan->personnel_area->id' => $this];
        $mrp = MRP::where($statusbase);
        // $pegawai = Unit::class->get();
    	return view('pages.unit.status',compact('mrp'));
    }

    public function getDetails($reg_num)
    {
        $detail = MRP::all();
    	return view('pages.unit.detail_mutasi',compact('detail'));
    }
}
