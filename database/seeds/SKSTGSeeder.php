<?php

use Illuminate\Database\Seeder;
use App\skstg;

class SKSTGSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skstg = new skstg;
        $skstg->id = Uuid::generate();
        $skstg->no_dokumen_proses_sk = '';
        $skstg->tahun_sk = '';
        $skstg->no_sk = '';
        $skstg->no_dokumen_kirim_sk = '';
        $skstg->tanggal_kirim_sk = '';
        $skstg->tanggal_aktivasi = '';
        $skstg->no_stg = '';
        $skstg->mrp_id = $mrp->id;
        $skstg->save();
    }
}