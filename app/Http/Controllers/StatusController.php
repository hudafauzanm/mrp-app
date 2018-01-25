<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Unit;
use App\MRP;
use App\Pegawai;
use App\PenilaianPegawai;
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
           // $fj = auth()->user()->formasi_jabatan->pluck('id')->toArray();
            $mrp = MRP::where('tipe', 2)->where('unit_pengusul', auth()->user()->id)->get();
           // $pegawai = Pegawai::where('formasi_jabatan_id', $fj);
            return view('pages.unit.status',compact('mrp'));
        }
        if(request('act')=='reqjab')
        {
            $mrp = MRP::where('tipe', 3)->where('unit_pengusul', auth()->user()->id)->get();
            return view('pages.unit.status',compact('mrp'));
        }
        if(request('act')=='res')
        {
            $fj = auth()->user()->formasi_jabatan->pluck('id')->toArray();
            
            $mrp = MRP::where('tipe', 2)->whereIn('formasi_jabatan_id', $fj)->get();
            return view('pages.unit.status',compact('mrp'));
            // dd($mrp);
        }
    	
    }

    public function getDetails($reg_num)
    {   
        
        $detail = MRP::where('registry_number', $reg_num)->first();
        $waktunilai = PenilaianPegawai::where('created_at', $detail->created_at)->where('pegawai_id', $detail->pegawai_id)->first();
         // dd($waktunilai);
        if($detail->tipe == '3')
        {
           return view('pages.unit.detail_bursa',compact('detail'));
        }
        else if($detail->tipe == '1')
        {
            return view('pages.unit.detail_minta',compact('detail'));
        }
        
        else if($detail->tipe == '2')
        {

    	   return view('pages.unit.detail_mutasi',compact('detail', 'waktunilai'));
        }
    }

    public function approve($reg_num){
        $status = MRP::where('registry_number', $reg_num)->first()->update(['Status' => 2]);
        
        return redirect('/status?act=res')->with('success', 'Status Diubah');
    }
}
