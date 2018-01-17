<?php

use Illuminate\Database\Seeder;
use App\PenilaianPegawai;

class PenilaianPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penpegawai = new PenilaianPegawai;
        $penpegawai->id = Uuid::generate();
        $penpegawai->nilai = '';
        $penpegawai->tindak_lanjut_pengembangan = '';
        $penpegawai->aspek_penilaian_id = $aspen->id;
        $penpegawai->pegawai_id = $pegawai->id;
        $penpegawai->save();
    }
}
