<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\SDM;

use App\MRP;

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

    public function ajaxDatatables(Request $request)
    {
        //Isi dengan kolom
        $columns = array(
            0 =>'created_at',
            1=> 'registry_number',
            2=> 'nama_pegawai',
            3=> 'tipe',
            4=> 'unit_pengusul',
            5=> 'status',
            6=> 'action'
        );

        //<-- Gak Perlu Diubah -->
        $totalData = MRP::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $mrps = MRP::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

        //<-- Gak Perlu Diubah END -->
        //Tambah orWhere di kolom yang akan dijadikan di search
            $mrps =  MRP::where('registry_number', 'LIKE',"%{$search}%")
                            ->orWhereHas('pegawai', function($query) use ($search){
                                $query->where('nama_pegawai', 'LIKE', "%{$search}%");
                            })
                            ->orWhereHas('personnel_area_pengusul', function($query) use ($search){
                                $query->where('nama', 'LIKE', "%{$search}%");
                            })
                            // ->orWhere('created_at', $search)
                            ->offset($start)
                            ->limit($limit)
                            // ->with(['pegawai:id,nip,nama_pegawai', 'personnel_area_pengusul:id,nama'])
                            ->orderBy($order,$dir)
                            ->get();
        //Tambah orWhere di kolom yang akan dijadikan di search
            $totalFiltered = MRP::where('registry_number', 'LIKE',"%{$search}%")
                                    ->orWhereHas('pegawai', function($query) use ($search){
                                        $query->where('nama_pegawai', 'LIKE', "%{$search}%");
                                    })
                                    ->orWhereHas('personnel_area_pengusul', function($query) use ($search){
                                        $query->where('nama', 'LIKE', "%{$search}%");
                                    })
                                    // ->orWhere('created_at', $search)
                                    ->count();
        }

        $data = array();
        if(!empty($mrps))
        {
            foreach ($mrps as $mrp)
            {
                //Apa yang akan ditampilkan di tiap2 row
                $nestedData['registry_number'] = $mrp->registry_number;
                $nestedData['nama_pegawai'] = $mrp->pegawai->nama_pegawai;
                $nestedData['tipe'] = $mrp->tipe;
                
                if($mrp->status == 0)
                    $nestedData['status'] = '<span class="label label-danger">Ditolak</span>';
                else if($mrp->status == 1)
                    $nestedData['status'] = '<span class="label label-primary">Diajukan</span>';
                else if($mrp->status == 2)
                    $nestedData['status'] = '<span class="label label-warning">Proses Evaluasi (SDM)</span>';
                else if($mrp->status == 3)
                    $nestedData['status'] = '<span class="label label-info">Proses Evaluasi (Karir II)</span>';
                else if($mrp->status == 4)
                    $nestedData['status'] = '<span class="label label-info">Proses Evaluasi (Karir II)</span>';
                else if($mrp->status == 5)
                    $nestedData['status'] = '<span class="label label-success">Proses SK</span>';
                else if($mrp->status == 6)
                    $nestedData['status'] = '<span class="label label-success">SK Tercetak</span>';
                else if($mrp->status == 7)
                    $nestedData['status'] = '<span class="label label-success">SK Pending</span>';
                else if($mrp->status == 8)
                    $nestedData['status'] = '<span class="label label-success">Clear</span>';
                else if($mrp->status == 99)
                    $nestedData['status'] = '<span class="label label-success">Ditolak (SDM Pusat)</span>';
                else if($mrp->status == 98)
                    $nestedData['status'] = '<span class="label label-success">Ditolak (Karir II Pusat)</span>';
                else
                    $nestedData['status'] = '<span class="label label-danger">???</span>';

                $nestedData['unit_pengusul'] = $mrp->personnel_area_pengusul->nama;
                $nestedData['created_at'] = $mrp->created_at->format("d F Y h:i:s");
                $nestedData['action'] =     
                '<a href="/mrp/edit/'.$mrp->registry_number.'" class="btn btn-xs btn-info">
                    <i class="fa fa-pencil-square-o"></i> Edit
                </a>
                <button class="btn btn-xs btn-green" data-toggle="modal" data-target="#detailModal" target="'.$mrp->registry_number.'">
                    <i class="fa fa-list"></i> Detail
                </button>
                <button class="btn btn-xs btn-red delete">
                    <i class="fa fa-trash"></i> Hapus
                </button>';

                // ID setter, untuk keperluan ajax delete
                $nestedData['DT_RowId'] = $mrp->id;
                

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
