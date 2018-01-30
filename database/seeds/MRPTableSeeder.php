<?php

use Illuminate\Database\Seeder;
use App\MRP;
use App\Pegawai;
use App\FormasiJabatan;
use App\SKSTg;
use App\PersonnelArea;
use Carbon\Carbon;

class MRPTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mrp = new MRP;
        $mrp->id = Uuid::generate();
        $mrp->registry_number = '7807299Z.Rotasi.151666060101_151666060302';
        $mrp->jenis_mutasi = 'Dinas';
        $mrp->mutasi = 'Rotasi';
        $mrp->jalur_mutasi = 'Intern Divisi Antar Bidang';
        $mrp->alasan_mutasi = 'Iseng aja';
        $mrp->unit_pengusul = 'by sistem';
        $mrp->no_dokumen_unit_usul = '00215/SIM.03.01KDIVSTI/2017-R';
        $mrp->filename_dokumen_unit_usul = '00215/SIM.03.01KDIVSTI/2017-R';
        $mrp->tgl_dokumen_unit_usul = '2017-06-05';
        $mrp->no_dokumen_unit_jawab = '00215/SIM.03.01KDIVSTI/2017-R';
        $mrp->filename_dokumen_unit_jawab = 'jawab_ya';
        $mrp->tgl_dokumen_unit_jawab = '2017-06-05';
        $mrp->no_dokumen_respon_sdm = '00215/SIM.03.01KDIVSTI/2017-R';
        $mrp->filename_dokumen_respon_sdm = 'responsdm';
        $mrp->tgl_dokumen_mutasi = Carbon::parse('2017-01-11');
        $mrp->tgl_evaluasi = Carbon::parse('2017-01-11');
        $mrp->requested_tgl_aktivasi = '2017-06-05'
        $mrp->tgl_pooling = Carbon::parse('2017-01-16');
        $mrp->tipe = '2';
        $mrp->status = 1;
        $mrp->tindak_lanjut = 'Cetak SK Definitif';
        $mrp->skstg_id = SKSTg::first()->id;
        $mrp->pegawai_id = Pegawai::first()->id;
        $mrp->nip_pengusul = Pegawai::first()->id;
        $mrp->nip_operator = Pegawai::first()->id;
        $mrp->formasi_jabatan_id = FormasiJabatan::first()->id;
        $mrp->save();

        // $mrp = new MRP;
        // $mrp->id = Uuid::generate();
        // $mrp->registry_number = '7906091Z.Promosi.151665030101_151665030101';
        // $mrp->jenis_mutasi = 'Dinas';
        // $mrp->mutasi = 'Promosi';
        // $mrp->jalur_mutasi = 'Definitif';
        // $mrp->unit_pengusul = 'by sistem';
        // $mrp->no_dokumen_unit_asal = 'C.2.0.0.04.2.04.17.01.7906091Z';
        // $mrp->tgl_dokumen_unit_asal = '2017-10-10';
        // $mrp->alasan_mutasi = 'Mengembangkan sayap';
        // $mrp->no_dokumen_unit_mutasi = 'C.2.0.0.04.2.04.17.01.7906091Z';
        // $mrp->tgl_dokumen_unit_mutasi = Carbon::parse('2017-10-10');
        // $mrp->tgl_evaluasi = Carbon::parse('2017-10-26');
        // $mrp->tgl_pooling = Carbon::parse('2017-10-23');
        // $mrp->no_dokumen_mutasi = '00297/SDM.00.03/MSBANGPIM/2017-R';
        // $mrp->tgl_dokumen_mutasi = Carbon::parse('2017-01-05');
        // $mrp->status = 1;
        // $mrp->pegawai_id = Pegawai::first()->id;
        // $mrp->formasi_jabatan_id = FormasiJabatan::skip(4)->first()->id;
        // $mrp->save();
    }
}