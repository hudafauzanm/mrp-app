<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Unit;
use App\Notifications\MutasiDitolak;
use App\Notifications\ProsesEvaluasi;
use App\Notifications\ButuhEvaluasi;

use App\MRP;
use App\Pegawai;
use App\PenilaianPegawai;
use App\PersonnelArea;
use Carbon\Carbon;

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
            return view('pages.unit.status_diajukan',compact('mrp'));
        }
        if(request('act')=='minta')
        {
           // $fj = auth()->user()->formasi_jabatan->pluck('id')->toArray();
            $mrp = MRP::where('tipe', 1)->where('unit_pengusul', auth()->user()->id)->get();
           // $pegawai = Pegawai::where('formasi_jabatan_id', $fj);
            return view('pages.unit.status_diajukan',compact('mrp'));
        }
        if(request('act')=='reqjab')
        {
            $mrp = MRP::where('tipe', 3)->where('unit_pengusul', auth()->user()->id)->get();
            return view('pages.unit.status_diajukan',compact('mrp'));
        }
        if(request('act')=='resjab')
        {
            $fj = auth()->user()->formasi_jabatan->pluck('id')->toArray();
            
            $mrp = MRP::where('tipe', 2)
                        ->whereIn('fj_tujuan', $fj)
                        ->get();

            return view('pages.unit.status_diterima',compact('mrp'));
            // dd($mrp);
        }
        if(request('act')=='resminta')
        {
            $fj = auth()->user()->formasi_jabatan->pluck('id')->toArray();
            
            $mrp = MRP::where('tipe', 1)
                        ->whereHas('pegawai', function($q) use ($fj){
                            $q->whereIn('fj_tujuan', $fj);
                        })
                        ->get();

            return view('pages.unit.status_diterima',compact('mrp'));
            // dd($mrp);
        }
    	
    }

    public function getDetails($reg_num)
    {   
        $detail = MRP::where('registry_number', $reg_num)->first();
        $waktunilai = $detail->penilaian_pegawai;
        
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
    public function approve()
    {
        $this->validate(request(), [
            'dokumen_unit_jawab' => 'required|mimes:pdf|max:10240'
        ]);

        $Status = MRP::where('registry_number', request('reg_num'))->first();
        // $Status = MRP::find(request('id'));
        $Status->status = 2;
        $Status->no_dokumen_unit_jawab = request('no_dokumen_unit_jawab');
        $Status->tgl_dokumen_unit_jawab = Carbon::now('Asia/Jakarta');

        $file = request('dokumen_unit_jawab');
        $foldername = $Status->registry_number.'/';
        $filename = 'JAWAB_'.Carbon::now('Asia/Jakarta')->year.str_replace('/', '_', $Status->no_dokumen_unit_jawab).'.'.$file->getClientOriginalExtension();
        $Status->filename_dokumen_unit_jawab = $filename;
        // dd($foldername, $filename);
        // $file->move(base_path(). '/storage/uploads/dok_asal/'.$foldername, $filename);
        $Status->save();
        $file->move(base_path(). '/public/storage/uploads/'.$foldername, $filename);

        $pengusul = $Status->personnel_area_pengusul;
        $data = [
            'reg_num' => $Status->registry_number,
            'user_id' => $pengusul->id,
            'mrp_id' => $Status->id
        ];
        $pengusul->notify(new ProsesEvaluasi($data));

        $sdm = PersonnelArea::where('user_role', 3)->first();
        $data = [
            'reg_num' => $Status->registry_number,
            'tipe' => $Status->tipe,
            'user_id' => $pengusul->id,
            'mrp_id' => $Status->id
        ];
        $sdm->notify(new ButuhEvaluasi($data));

        
        return back()->with('success', 'Status Diubah');
    }

    //Decline dari Unit
    public function decline($reg_num)
    {
        $mrp = MRP::where('registry_number', $reg_num)->first();
        $mrp->update(['status' => 97]);

        $pengusul = $mrp->personnel_area_pengusul;
        $data = [
            'reg_num' => $mrp->registry_number,
            'penolak' => auth()->user()->nama_pendek,
            'user_id' => $pengusul->id,
            'mrp_id' => $mrp->id
        ];
        $pengusul->notify(new MutasiDitolak($data));
        
        return back()->with('success', 'Status Diubah');
    }

    public function finishMutasi($reg_num)
    {
        $mrp = MRP::where('registry_number', $reg_num)->firstOrFail();
        $mrp->status = 8;
        $mrp->save();

        return back()->with('success', 'Berhasil konfirmasi aktivasi');
    }
}
