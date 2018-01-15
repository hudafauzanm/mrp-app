<?php

use Illuminate\Database\Seeder;
use App\DiklatPenjenjangan;

class DiklatPenjenjanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dikpen = new DiklatPenjenjangan;
        $dikpen->id = Uuid::generate();
        $dikpen->jenis_diklat = 'EE I';
        $dikpen->tanggal_usulan = '';
        $dikpen->tanggal_mulai = '04.12.2010';
        $dikpen->tanggal_lulus = '13.07.2011';
        $dikpen->nilai = '81,31';
        $dikpen->grade = 'GRADE C (MEMUASKAN)';
        $dikpen->nomor_sertifikat = 'C.2.0.0.01.4.10.01.6493037Z';
        $dikpen->hasil_nilai_assesment = '';
        $dikpen->direktorat_id = $pegawai->id;
        $dikpen->save();
    }
}