<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Unit;
use Carbon\Carbon;
use Uuid;

use App\MRP;
use App\Pegawai;
use App\PenilaianPegawai;
use App\PersonnelArea;
use App\FormasiJabatan;

class MutasiController extends Controller
{
    public function __construct()
    {
    	$this->middleware(Unit::class);
    }

    public function index()
    {
    	$tipe = request('tipe');

    	if($tipe === '1')
    	{
            $units = PersonnelArea::all();

    		return view('pages.unit.meminta',compact('units'));
    	}
    	else if($tipe === '2')
    	{
            $units = PersonnelArea::all();

    		return view('pages.unit.bursa_pegawai', compact('units'));
    	}
    	else if($tipe === '3')
    	{
            $personnelarea = auth()->user();
            $formasis = $personnelarea->formasi_jabatan()->select('formasi')->distinct()->get()->all();            
            
    		return view('pages.unit.request_jabatan',compact('personnelarea','formasis'));
    	}
    	else
    	{
    		return abort(404);
    	}
    }

    public function getPegawaiInfo()
    {
        $pegawai = Pegawai::where('nip', request('nip'))->first();
        $user = auth()->user();
        
        if($pegawai)
        {
            $fj = $pegawai->formasi_jabatan;
            if($fj->personnel_area->id != $user->id)
                return response()->json(NULL);
            
            $pegawai->forja = $fj->formasi.' '.$fj->jabatan;
            $pegawai->posisi = $fj->posisi;
            $pegawai->personnel_area = $fj->personnel_area->nama;
            $pegawai->masa_kerja = $pegawai->time_diff(Carbon::parse($pegawai->tanggal_pegawai), Carbon::now('Asia/Jakarta'));
            $pegawai->sisa_masa_kerja = $pegawai->time_diff(Carbon::now('Asia/Jakarta'), Carbon::parse($pegawai->tanggal_lahir)->addYears(56));
            $pegawai->lama_menjabat = $pegawai->time_diff(Carbon::parse($pegawai->start_date), Carbon::now('Asia/Jakarta'));
            $pegawai->kode_olah_forja = $fj->kode_olah;
        }

        return response()->json($pegawai);
    }

    public function getFormasi()
    {
        $unit = PersonnelArea::find(request('unit_id'));

        if($unit)
        {
            $retval = $unit->formasi_jabatan()->select('formasi')->distinct()->get()->all();
            return response()->json($retval);
        }
        else
            return response()->json(NULL);
    }

    public function getJabatan()
    {
        $unit = PersonnelArea::find(request('unit_id'));

        if($unit)
        {
            $retval = $unit->formasi_jabatan->where('formasi', request('formasi'))->where('kode_olah', '!=', request('kode_olah'))->pluck('jabatan', 'kode_olah')->toArray();
            return response()->json($retval);
        }
        else
            return response()->json(NULL);
    }

    //request jabatan

    public function getFormasiJabs()
    {
        $unit = auth()->user();

        if($unit)
        {
            $retval = $unit->formasi_jabatan->where('formasi', request('formasi'))->pluck('jabatan', 'kode_olah')->toArray();
            return response()->json($retval);
        }
        else
            return response()->json(NULL);
    }

    public function getJabatanInfo()
    {
        $jabatans = FormasiJabatan::where('kode_olah', request('jabatan_id'))->first();

        return response()->json($jabatans);
                 
    }

    //

    public function submitForm()
    {
        $tipe = request('mrp')['tipe'];
        $nip = request('nip');

        if($tipe === '1')
        {
            $this->validate(request(), [
                'file_dokumen_mutasi' => 'required|mimes:pdf|max:10240'
            ]);

            $pegawai_id = Pegawai::where('nip', $nip)->first()->id;

            if(request('rekom_checkbox') === '1')
                $id_proyeksi = FormasiJabatan::select('id')->where('kode_olah', request('kode_olah'))->first()->id;
            else
                $id_proyeksi = NULL;

            $tambahan_mrp = array(
                'id' => Uuid::generate(),
                'registry_number' => $nip.'.'.request('mrp')["mutasi"][0].'.'.\Carbon\Carbon::now('Asia/Jakarta'),
                'status' => 1,
                'nip_operator' => request()->session()->get('nip_operator'),
                'unit_pengusul' => auth()->user()->id,
                'pegawai_id' => $pegawai_id,
                'formasi_jabatan_id' => $id_proyeksi,
            );

            $data_mrp = array_merge($tambahan_mrp, request('mrp'));

            $mrp = MRP::create($data_mrp);

            $file = request('file_dokumen_mutasi');
            $foldername = $mrp->registry_number.'/';
            $filename = 'USUL_'.str_replace('/', '_', $mrp->no_dokumen_unit_asal).'.'.$file->getClientOriginalExtension();

            // $file->move(base_path(). '/public/storage/uploads/'.$foldername, $filename);

            return redirect('/status/detail/'.$mrp->registry_number)->with('success', 'Berhasil Meminta Pegawai');
        }

        else if($tipe === '2')
        {

            $this->validate(request(), [
            'file_dokumen_mutasi' => 'required|mimes:pdf|max:10240'
            ]);

            $pegawai_id = Pegawai::where('nip', $nip)->first()->id;

            if(request('rekom_checkbox') === '1')
                $id_proyeksi = FormasiJabatan::select('id')->where('kode_olah', request('kode_olah'))->first()->id;
            else
                $id_proyeksi = NULL;

            $tambahan_mrp = array(
                'id' => Uuid::generate(),
                'registry_number' => $nip.'.'.request('mrp')["mutasi"][0].'.'.\Carbon\Carbon::now('Asia/Jakarta'),
                'status' => 1,
                'nip_operator' => request()->session()->get('nip_operator'),
                'unit_pengusul' => auth()->user()->id,
                'pegawai_id' => $pegawai_id,
                'formasi_jabatan_id' => $id_proyeksi,
            );
            // dd(request('nilai')['hubungan_sesama']);

            $data_mrp = array_merge($tambahan_mrp, request('mrp'));
            $data_nilai = array_merge(request('nilai'), array('pegawai_id' => $pegawai_id));;
            $data_nilai['hubungan_sesama'] = request('hds').'-'.$data_nilai['hubungan_sesama'];
            // dd($data_mrp, $data_nilai, request('hds'));

            $mrp = MRP::create($data_mrp);
            $nilai = PenilaianPegawai::create($data_nilai);

            $file = request('file_dokumen_mutasi');
            $foldername = $mrp->registry_number.'/';
            $filename = 'USUL_'.str_replace('/', '_', $mrp->no_dokumen_unit_asal).'.'.$file->getClientOriginalExtension();
            // dd($foldername, $filename);
            // $file->move(base_path(). '/storage/uploads/dok_asal/'.$foldername, $filename);
            // $file->move(base_path(). '/public/storage/uploads/'.$foldername, $filename);

            return redirect('/status/detail/'.$mrp->registry_number)->with('success', 'Pegawai berhasil dibursakan');       
        }
        else if($tipe === '3') 
         {  
            //dd(request()->all());

            $this->validate(request(), [
                'file_dokumen_mutasi' => 'required|mimes:pdf|max:10240'
            ]);

            $id_proyeksi = FormasiJabatan::select('id')->where('kode_olah', request('kode_olah'))->first()->id;
            
            $input_mrp = array(
                'id' => Uuid::generate(),
                'registry_number' => $nip.'.Request.'.\Carbon\Carbon::now('Asia/Jakarta'),
                'status' => 1,
                'nip_operator' => request()->session()->get('nip_operator'),
                'unit_pengusul' => auth()->user()->id,
                'formasi_jabatan_id' => $id_proyeksi,
            );

            $data_mrp = array_merge($input_mrp, request('mrp'));

            $mrp = MRP::create($data_mrp);

            $file = request('file_dokumen_mutasi');
            $foldername = $mrp->registry_number.'/';
            $filename = 'USUL_'.str_replace('/', '.', $mrp->no_dokumen_unit_asal).'.'.$file->getClientOriginalExtension();
            //$file->move(base_path(). '/public/storage/uploads/'.$foldername, $filename);

            return redirect('/status/detail/'.$mrp->registry_number)->with('success', 'Berhasil Bursa Jabatan');

         } 
    }
}
