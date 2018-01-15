<?php

use Illuminate\Database\Seeder;
use App\MRP;

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
        $mrp->no_dokumen_unit_asal = '00215/SIM.03.01KDIVSTI/2017-R';
        $mrp->tgl_dokumen_unit_asal = '05.06.2017';
        $mrp->alasan_mutasi = '';
        $mrp->no_dokumen_unit_mutasi = '';
        $mrp->tgl_dokumen_unit_mutasi = '';
        $mrp->tgl_evaluasi = '';
        $mrp->tgl_pooling = '';
        $mrp->no_dokumen_mutasi = '';
        $mrp->tgl_dokumen_mutasi = '';
        $mrp->status = '';
        $mrp->tindak_lanjut = '';
        $mrp->sk_stg_id = $skstg->id;
        $mrp->pegawai_id = $pegawai->id;
        $mrp->save();
    }
}