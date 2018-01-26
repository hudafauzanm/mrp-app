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
            
            $mrp = MRP::where('tipe', 2)->orWhere('tipe',1)->whereIn('formasi_jabatan_id', $fj)->get();
            return view('pages.unit.status',compact('mrp'));
            // dd($mrp);
        }
    	
    }

    public function getDetails($reg_num)
    {   
        $detail = MRP::where('registry_number', $reg_num)->first();
        $waktunilai = PenilaianPegawai::where('created_at', $detail->created_at)->where('pegawai_id', $detail->pegawai_id)->first();
        //$waktunilai = $detail->penilaian_pegawai;
        
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

    // Approve dari Unit
    public function approve($reg_num){
        $this->validate(request(), [
            'dokumen_unit_jawab' => 'required|mimes:pdf|max:10240'
        ]);


        $status = MRP::where('registry_number', $reg_num)->first();
        dd($Status);
        $Status->update(['Status' => 2]);
        $Status->no_dokumen_unit_jawab = request('no_dokumen_unit_jawab');
        $Status->tgl_dokumen_unit_jawab = Carbon::now('Asia/Jakarta');

        $file = request('dokumen_unit_jawab');
        $foldername = $mrp->registry_number.'/';
        $filename = 'JAWAB_'.str_replace('/', '_', $mrp->no_dokumen_unit_jawab).'.'.$file->getClientOriginalExtension();
        $Status->filename_no_dokumen_unit_jawab = $filename;
        // dd($foldername, $filename);
        // $file->move(base_path(). '/storage/uploads/dok_asal/'.$foldername, $filename);
        $Status->save();
        $file->move(base_path(). '/public/storage/uploads/'.$foldername, $filename);

        // $pengusul = $Status->personnel_area_pengusul;
        // $data = [
        //     'reg_num' => $Status->registry_number,
        //     'user_id' => $pengusul->id,
        //     'mrp_id' => $Status->id
        // ];
        // $pengusul->notify(new ProsesEvaluasi($data));

        // $sdm = PersonnelArea::where('user_role', 3)->first();
        // $data = [
        //     'reg_num' => $Status->registry_number,
        //     'tipe' => $Status->tipe,
        //     'user_id' => $pengusul->id,
        //     'mrp_id' => $Status->id
        // ];
        // $sdm->notify(new ButuhEvaluasi($data));

        
        return redirect('/status?act=res')->with('success', 'Status Diubah');
    }

    //Decline dari Unit
    public function decline($reg_num){
        $status = MRP::where('registry_number', $reg_num)->first()->update(['Status' => 0]);
        
        return redirect('/status?act=res')->with('success', 'Status Diubah');
    }
}
