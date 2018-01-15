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
        $mrp->registry_number = '';
        $mrp->jenis_mutasi = '';
        $mrp->mutasi = '';
        $mrp->jalur_mutasi = '';
        $mrp->no_dokumen_unit_asal = '';
        $mrp->tgl_dokumen_unit_asal = '';
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