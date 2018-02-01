<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\PersonnelArea;
use App\SKSTg;
use App\MRP;

class MonitoringController extends Controller
{
    public function __construct()
    {
    	return $this->middleware('auth');
    }

    /* 
	expected data output
	$data
		|_struktural
			|_jenjang
				|_level
					|_ isi
					|_ akan
					|_ pagu
					|_ delta
				|_level
					|_ isi
					|_ akan
					|_ pagu
					|_ delta
			|_jenjang
				|_level
					|_ isi
					|_ akan
					|_ pagu
					|_ delta
				|_level
					|_ isi
					|_ akan
					|_ pagu
					|_ delta
		|_fungsional
			|_ nama_pendek_unit
				|_level
					|_ isi
					|_ akan
					|_ pagu
					|_ delta
				|_level
					|_ isi
					|_ akan
					|_ pagu
					|_ delta
		|_table
			|_ direktorat
			|_ personnel area
			|_ formasi
			|_ jabatan
			|_ jenjang
            |_ status
			|_ nip
			|_ nama
	*/
    public function getRealisasiPagu()
    {
    	$units = PersonnelArea::where('user_role', 1)->get();
    	$selected_unit = request('unit');
    	$selected_level = request('level');
        $is_unit = request()->has('is_unit') ? request('is_unit') : false;
    	// $selected_unit = 'all';
    	// $selected_level = 'all';
    	// $fungsional = ['F00', 'F01', 'F02', 'F03', 'F04', 'F05'];
    	$fungsional = ['00', '01', '02', '03', '04', '05'];
    	$struktural = ['MA', 'MM', 'MD', 'SPVA', 'SPVD'];
    	$data['struktural'] = [];
    	$data['table'] = [];

    	if($selected_unit != 'all')
    	{
    		$units = $units->where('username', $selected_unit);
    	}

    	// dd($units);

    	// $units = $units->groupBy('nama_pendek');

    	foreach ($units as $index => $unit) //unit
    	{
    		$fjs = $unit->formasi_jabatan;

    		if($selected_level != 'all')
	    	{
	    		$fjs = $fjs->where('level', $selected_level);
	    	}

	    	$this->getTableData($fjs, $unit, $data['table'], $is_unit);
    		// dd($fjs->whereIn('jenjang_id', $struktural)->groupBy('jenjang_id')->all());
    		$struks = $fjs->whereIn('jenjang_id', $struktural)->groupBy('jenjang_id')->all();
    		$fungs = $fjs->whereIn('jenjang_id', $fungsional);
			// dd($fungs);

			foreach($struks as $jenjang => $val) //jenjang
			{
				$struks[$jenjang] = $val->groupBy('level')->all();

				if (!isset($data['struktural'][$jenjang])) 
				{
					$data['struktural'][$jenjang] = [];
				}

				foreach($struks[$jenjang] as $level => $nilai)
				{
					if (!isset($data['struktural'][$level])) 
					{
						$data['struktural'][$jenjang][$level] = [
							'pagu' => 0,
							'isi' => 0,
							'akan' => 0,
							'delta' => 0
						];
					}
					// dd($nilai);
					$temp_pagu = $nilai->sum('pagu');
					$temp_isi = $this->getIsi($nilai);
					$temp_akan = $this->getAkanIsi($nilai, $temp_isi);
					$temp_delta = $temp_pagu - $temp_isi;

					$data['struktural'][$jenjang][$level]['pagu'] += $temp_pagu;
					$data['struktural'][$jenjang][$level]['isi'] += $temp_isi;
					$data['struktural'][$jenjang][$level]['akan'] += $temp_akan;
					$data['struktural'][$jenjang][$level]['delta'] += $temp_delta;
				}
			}

			if($fungs)
			{
				$data['fungsional'][$unit->nama_pendek] = [];
				$fungs = $fungs->groupBy('level')->all();
				foreach($fungs as $level => $nilai)
				{
					$data['fungsional'][$unit->nama_pendek][$level] = [];
					$data['fungsional'][$unit->nama_pendek][$level]['pagu'] = $nilai->sum('pagu');
					$data['fungsional'][$unit->nama_pendek][$level]['isi'] = $this->getIsi($nilai);
					$data['fungsional'][$unit->nama_pendek][$level]['akan'] = $this->getAkanIsi($nilai, $data['fungsional'][$unit->nama_pendek][$level]['isi']);
					$data['fungsional'][$unit->nama_pendek][$level]['delta'] = $data['fungsional'][$unit->nama_pendek][$level]['pagu'] - $data['fungsional'][$unit->nama_pendek][$level]['isi'];

				}
			}
			else
				$data['fungsional'][$unit->nama_pendek] = null;
    	}

		// dd($data['table']);
    	return response()->json($data);
    }

    public function getIsi($formasi_jabatan)
    {
    	$jumlah = 0;

    	foreach ($formasi_jabatan as $key => $fj) 
    	{
    		$jumlah += $fj->pegawai->count();
    	}

    	return $jumlah;
    }

    public function getAkanIsi($formasi_jabatan, $data)
    {
    	$jumlah = 0;

    	foreach ($formasi_jabatan as $fj) 
    	{
    		$jumlah += $fj->mrp_tujuan->where('status', '<', 7)->count();
    	}

    	return $jumlah + $data;
    }

    /*
    expected output if unit
        $retval => array
            |_ 0
                |_ formasi
                |_ jabatan
                |_ jumlah kosong
            |_ 1
                |_ formasi
                |_ jabatan
                |_ jumlah kosong            
    */

    public function getTableData($forja_perunit, $unit, &$retval, $is_unit)
    {
        foreach ($forja_perunit as $fj) 
        {
    		$realisasi = $fj->pegawai->count();

            if($is_unit)
            {
                if($realisasi < $fj->pagu)
                {
                    $data = [
                        'formasi' => $fj->formasi,
                        'jabatan' => $fj->jabatan,
                        'kosong' => $fj->pagu - $realisasi
                    ];
                    array_push($retval, $data);
                }
                else
                    continue;
            }
            else
            {
                $data = [
                    'no' => '',
                    'direktorat' => $unit->direktorat->nama,
                    'personnel_area' => $unit->nama_pendek,
                    'formasi' => $fj->formasi,
                    'jabatan' => $fj->jabatan,
                    'jenjang' => $fj->jenjang_txt,
                    'status' => 'kosong'
                ];

                if($realisasi)
                {
                    if ($realisasi < $fj->pagu) 
                        $data['status'] = 'terisi';
                    else if ($realisasi >= $fj->pagu)
                        $data['status'] = 'penuh';

                    foreach ($fj->pegawai as $pegawai) 
                    {
                        $data['nip'] = $pegawai->nip;
                        $data['nama'] = $pegawai->nama_pegawai;
                        array_push($retval, $data);
                    }
                }
                else
                {
                    $data['nip'] = '-';
                    $data['nama'] = '-';
                    array_push($retval, $data);
                }
            }
    	}
    	return;
    }

    /* expected output
    $data
    	|_ chart
			|_ nama_pendek_unit
				|_ cetak
				|_ kirim
				|_ batal
		|_table
			|_ no
			|_ nip
			|_ nama
			|_ unit asal
			|_ unit tujuan
			|_ status
	*/
    public function getPergerakanSK()
    {
	 	$selected_unit = request('unit');

    	if($selected_unit === 'all')
    		$skstg = SKSTg::all();
	 	else
	 	{
			$unit = PersonnelArea::where('username', $selected_unit)->first();
			$mrp_ids = MRP::select('id')->where('unit_pengusul', $unit->id)->pluck('id')->toArray();
			$skstg = SKSTg::whereIn('mrp_id', $mrp_ids)->get();
	 	}

    	$data['chart'] = [];
    	$data['table'] = [];

    	foreach ($skstg as $sk) 
    	{
    		$mrp = $sk->mrp;
    		$pegawai = $mrp->pegawai;
    		$unit = $pegawai->formasi_jabatan->personnel_area->nama_pendek;
    		$temp_tabel = [
    			'no' => '',
    			'nip' => $pegawai->nip,
    			'nama' => $pegawai->nama_pegawai,
    			'unit_asal' => $unit,
    			'unit_tujuan' => $mrp->formasi_jabatan->personnel_area->nama_pendek
    		];

    		if(!isset($data['chart'][$unit]))
    		{
    			$data['chart'][$unit] = [
    				'cetak' => 0,
    				'kirim' => 0,
    				'batal' => 0
    			];
    		}

    		$data['chart'][$unit]['cetak'] += 1;
    		$temp_tabel['status'] = 'Cetak';
    		if($sk->tgl_kirim_sk <= Carbon::now('Asia/Jakarta'))
    		{
    			$data['chart'][$unit]['kirim'] += 1;
    			$temp_tabel['status'] = 'Kirim';
    		}

    		array_push($data['table'], $temp_tabel);
    	}
   
    	return response()->json($data);
    }

    public function getRealisasiPaguPerUnit()
    {
        /* 
        expected data output
        $data
            |_jenjang
                    |_ isi
                    |_ akan
                    |_ pagu
                    |_ delta
            |_jenjang
                    |_ isi
                    |_ akan
                    |_ pagu
                    |_ delta
        */
        $unit = auth()->user();
        $forja = $unit->formasi_jabatan->groupBy('jenjang_id')->all();

        foreach ($forja as $jenjang => $nilai) 
        {
            if(!isset($data[$jenjang]))
            {
                $data[$jenjang] = [
                    'pagu' => 0,
                    'isi' => 0,
                    'akan' => 0,
                    'delta' => 0,
                ];
            }

            $temp_pagu = $nilai->sum('pagu');
            $temp_isi = $this->getIsi($nilai);
            $temp_akan = $this->getAkanIsi($nilai, $temp_isi);
            $temp_delta = $temp_pagu - $temp_isi;

            $data[$jenjang]['pagu'] += $temp_pagu;
            $data[$jenjang]['isi'] += $temp_isi;
            $data[$jenjang]['akan'] += $temp_akan;
            $data[$jenjang]['delta'] += $temp_delta;
        }

        return response()->json($data);
    }
}
