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
        $skstg->tahun_sk = '';
        $skstg->no_sk = '';
        $skstg->no_dokumen_kirim_sk = '';
        $skstg->filename_dokumen_sk = '';
        $skstg->tgl_kirim_sk = '';
        $skstg->tgl_aktivasi = '';
        $skstg->no_stg = '';
        $skstg->mrp_id = $mrp->id;
        $skstg->save();
    }
}