<?php

use Illuminate\Database\Seeder;
use App\DiklatPenjenjangan;
use App\Pegawai;

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
        $dikpen->pegawai_id = Pegawai::first()->id;
        $dikpen->save();

        $dikpen = new DiklatPenjenjangan;
        $dikpen->id = Uuid::generate();
        $dikpen->jenis_diklat = 'EE II';
        $dikpen->tanggal_usulan = '';
        $dikpen->tanggal_mulai = '25.04.2011';
        $dikpen->tanggal_lulus = '23.12.2011';
        $dikpen->nilai = '80,52';
        $dikpen->grade = 'GRADE C (MEMUASKAN)';
        $dikpen->nomor_sertifikat = 'C.2.0.0.07.3.02.11.01.6494019W';
        $dikpen->hasil_nilai_assesment = '';
        $dikpen->direktorat_id = $dir->id;
        $dikpen->save();

        $dikpen = new DiklatPenjenjangan;
        $dikpen->id = Uuid::generate();
        $dikpen->jenis_diklat = 'EE III';
        $dikpen->tanggal_usulan = '';
        $dikpen->tanggal_mulai = '16.02.2016';
        $dikpen->tanggal_lulus = '05.12.2016';
        $dikpen->nilai = '73,61';
        $dikpen->grade = 'GRADE D (CUKUP)';
        $dikpen->nomor_sertifikat = 'C.2.0.0.07.3.05.16.02.6794103G';
        $dikpen->hasil_nilai_assesment = '';
        $dikpen->direktorat_id = $dir->id;
        $dikpen->save();

        $dikpen = new DiklatPenjenjangan;
        $dikpen->id = Uuid::generate();
        $dikpen->jenis_diklat = 'SSE II';
        $dikpen->tanggal_usulan = '';
        $dikpen->tanggal_mulai = '02.03.2016';
        $dikpen->tanggal_lulus = '18.01.2017';
        $dikpen->nilai = '78,62';
        $dikpen->grade = 'GRADE C (MEMUASKAN)';
        $dikpen->nomor_sertifikat = 'C.2.0.0.08.3.03.16.01.6184209Z';
        $dikpen->hasil_nilai_assesment = '';
        $dikpen->direktorat_id = $dir->id;
        $dikpen->save();

        $dikpen = new DiklatPenjenjangan;
        $dikpen->id = Uuid::generate();
        $dikpen->jenis_diklat = 'SSE III';
        $dikpen->tanggal_usulan = '';
        $dikpen->tanggal_mulai = '27.11.2013';
        $dikpen->tanggal_lulus = '12.02.2014';
        $dikpen->nilai = '86,79791667';
        $dikpen->grade = 'GRADE B (SANGAT MEMUASKAN)';
        $dikpen->nomor_sertifikat = 'C.2.0.0.05.2.02.13.01.6594002F';
        $dikpen->hasil_nilai_assesment = '';
        $dikpen->direktorat_id = $dir->id;
        $dikpen->save();
    }
}