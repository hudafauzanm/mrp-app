<?php

use Illuminate\Database\Seeder;
use App\FRS;

class FRSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $frs = new FRS;
        $frs->id = Uuid::generate();
        $frs->nama = '';
        $frs->nip = '156651';
        $frs->perner = '';
        $frs->tingkat = 'S1';
        $frs->bidang_profesi = 'Niaga';
        $frs->jurusan = 'Administrasi Bisnis';
        $frs->konsentrasi = 'Administrasi Bisnis';
        $frs->tindaklanjut = 'Approved';
        $frs->source = 'FRS';
        $frs->lt = '';
        $frs->hasil_penjabatan = 'Lulus';
        $frs->tahun_sk = '';
        $frs->tgl_pegawai_tetap = '07.10.2017';
        $frs->no_sk = '';
        $frs->instansi_akademik = 'Institut Teknologi Bandung';

        $frs->save();
    }
}
