<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\SDM;
use Uuid;

use App\MRP;
use App\SKSTg;

class SKController extends Controller
{
	public function __construct()
	{
		return $this->middleware(SDM::class);
	}

    public function index()
    {
        $mrpsk = MRP::where('status', 4)->get();
        return view('pages.sdm.sk', compact('mrpsk'));
    }
    
    public function uploadSK(Request $request)
    {
       
        $this->validate($request, [
            'file_dokumen_sk' => 'required|mimes:pdf|max:10240',
        ]);

        $mrp = MRP::findOrFail($request->input('mrp_id'));
        $skstg = new SKSTg;

        $skstg->id=Uuid::generate();
        $skstg->tahun_sk=$request->input('tahun_sk'); 
        $skstg->no_sk=$request->input('no_sk');
        $skstg->no_dokumen_kirim_sk=$request->input('no_dokumen_kirim_sk');
        $skstg->tgl_kirim_sk=$request->input('tgl_kirim_sk');
        $skstg->tgl_aktivasi=$request->input('tgl_aktivasi');
        $skstg->no_stg=$request->input('no_stg');
        $skstg->mrp_id=$mrp->id;

        $file = $request->file('file_dokumen_sk');
        $foldername = $mrp->registry_number.'/';
        $filename = 'SK_'.$skstg->tahun_sk.'_'.str_replace('/', '_', $skstg->no_sk).'.'.$file->getClientOriginalExtension();

        $file->move(base_path(). '/public/storage/uploads/'.$foldername, $filename);
        $skstg->filename_dokumen_sk = $filename;

        $skstg->save();
        
        $mrp->skstg_id = $skstg->id;
        $mrp->status = 5;
        $mrp->save();

        return redirect('/sk')->with('success', 'SK Berhasil Diupload');
    }

    public function ajaxDatatables(Request $request)
    {
        //Isi dengan kolom
        $columns = array(
            0 =>'no_sk',
            1=> 'no_stg',
            2=> 'tahun_sk',
            3=> 'no_dokumen_kirim_sk',
            4=> 'tgl_kirim_sk',
            5=> 'tgl_aktivasi',
            6=> 'dokumen'
        );

        //<-- Gak Perlu Diubah -->
        $totalData = SKSTg::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $skstgs = SKSTg::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

        //<-- Gak Perlu Diubah END -->
        //Tambah orWhere di kolom yang akan dijadikan di search
            $skstgs =  SKSTg::where('no_sk', 'LIKE',"%{$search}%")
                            ->orWhere('no_stg', 'LIKE',"%{$search}%")
                            ->orWhere('tahun_sk', 'LIKE',"%{$search}%")
                            ->orWhere('no_dokumen_kirim_sk', 'LIKE',"%{$search}%")
                            ->orWhere('tgl_kirim_sk', 'LIKE',"%{$search}%")
                            ->orWhere('tgl_aktivasi', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        //Tambah orWhere di kolom yang akan dijadikan di search
            $totalFiltered = SKSTg::where('no_sk', 'LIKE',"%{$search}%")
                                    ->orWhere('no_stg', 'LIKE',"%{$search}%")
                                    ->orWhere('tahun_sk', 'LIKE',"%{$search}%")
                                    ->orWhere('no_dokumen_kirim_sk', 'LIKE',"%{$search}%")
                                    ->orWhere('tgl_kirim_sk', 'LIKE',"%{$search}%")
                                    ->orWhere('tgl_aktivasi', 'LIKE',"%{$search}%")
                                    ->count();
        }

        $data = array();
        if(!empty($skstgs))
        {
            foreach ($skstgs as $skstg)
            {
                //Apa yang akan ditampilkan di tiap2 row
                $nestedData['no_sk'] = $skstg->no_sk;
                $nestedData['no_stg'] = $skstg->no_stg ? $skstg->no_stg : '-';
                $nestedData['tahun_sk'] = $skstg->tahun_sk;
                $nestedData['no_dokumen_kirim_sk'] = $skstg->no_dokumen_kirim_sk;
                $nestedData['tgl_kirim_sk'] = $skstg->tgl_kirim_sk->format("d F Y");
                $nestedData['tgl_aktivasi'] = $skstg->tgl_aktivasi->format("d F Y");
                $nestedData['dokumen'] =     
                '<a href="/download/'.$skstg->mrp->registry_number.'/'.$skstg->filename_dokumen_sk.'" class="btn btn-sm btn-info">
                    <i class="fa fa-download"></i> Download SK
                </a>';

                $data[] = $nestedData;

            }
        }
        
        //<-- Gak Perlu Diubah -->
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
        
        return json_encode($json_data); 
        //<-- Gak Perlu Diubah END -->
    }
}
