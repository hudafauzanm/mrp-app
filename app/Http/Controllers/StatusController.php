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
        if(request('act')=='req')
        {
            $mrp = MRP::where('unit_pengusul', auth()->user()->id)->get();
        }
        else if(request('act')=='res')
        {
            // $mrp = MRP::where('formasi_jabatan_id->formasi_jabatan->personnel_area', auth()->user()->id)->get();
        }
    	return view('pages.unit.status',compact('mrp'));
    }

    public function getDetails($reg_num)
    {
        $detail = MRP::where('registry_number', $reg_num)->get();
    	return view('pages.unit.detail_mutasi',compact('detail'));
    }
}
