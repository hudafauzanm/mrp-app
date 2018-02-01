<?php

use Illuminate\Database\Seeder;
use App\FormasiJabatan;
use App\PersonnelArea;

class FormasiJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forjab = new FormasiJabatan;
        $forjab->id = Uuid::generate();
        $forjab->kode_olah = 'DITDAN-15166401.MA';
        $forjab->legacy_code = '15166401';
        $forjab->posisi = 'DIREKTORAT PENGADAAN PT PLN (PERSERO) KANTOR PUSAT';
        $forjab->formasi ='Kepala Divisi';
        $forjab->jabatan ='Perijinan dan Pertanahan';
        $forjab->jenjang_id ='MA';
        $forjab->jenjang_txt ='Manajemen Atas';
        $forjab->pagu = 1;
        $forjab->level = 'KP';
        // $forjab->realisasi = 1;
        $forjab->spfj ='0324.P/DIR/2016';
        $forjab->status_fj ='';
        $forjab->personnel_area_id = PersonnelArea::where('user_role', 1)->first()->id;
        $forjab->save();

        $forjab = new FormasiJabatan;
        $forjab->id = Uuid::generate();
        $forjab->kode_olah = 'DITDAN-151664020101.F04';
        $forjab->legacy_code = '15166401';
        $forjab->posisi = 'SUB BIDANG PENGADAAN 1 BIDANG PELAKSANA PENGADAAN I DIVISI PENGADAAN STRATEGIS DIREKTORAT PENGADAAN PT PLN (PERSERO) KANTOR PUSAT';
        $forjab->formasi ='Analyst';
        $forjab->jabatan ='Pengadaan';
        $forjab->jenjang_id ='04';
        $forjab->jenjang_txt ='Fungsional IV';
        $forjab->pagu = 5;
        $forjab->level = 'KP';
        // $forjab->realisasi = 2;
        $forjab->spfj ='0324.P/DIR/2016';
        $forjab->status_fj ='';
        $forjab->personnel_area_id = PersonnelArea::where('user_role', 1)->skip(1)->first()->id;
        $forjab->save();

        $forjab = new FormasiJabatan;
        $forjab->id = Uuid::generate();
        $forjab->kode_olah = 'DITREG-JBB-1516730101.MM';
        $forjab->legacy_code = '1516730101';
        $forjab->posisi = 'DIVISI PENGEMBANGAN REGIONAL JAWA BAGIAN BARAT DIREKTORAT BISNIS REGIONAL JAWA BAGIAN BARAT PT PLN (PERSERO) KANTOR PUSAT';
        $forjab->formasi ='Manajer Senior';
        $forjab->jabatan ='Perencanaan dan Pengendalian Regional Jawa Bagian Barat';
        $forjab->jenjang_id ='MM';
        $forjab->jenjang_txt ='Manajemen Menengah';
        $forjab->pagu =5;
        $forjab->level ='KP';
        // $forjab->realisasi =1;
        $forjab->spfj ='0037.P/DIR/2016';
        $forjab->status_fj ='';
        $forjab->personnel_area_id = PersonnelArea::where('nama_pendek', 'DISJABAR')->first()->id;
        $forjab->save();

        $forjab = new FormasiJabatan;
        $forjab->id = Uuid::generate();
        $forjab->kode_olah = 'DITREG-JBB-151673010101.MD';
        $forjab->legacy_code = '151673010101';
        $forjab->posisi = 'BIDANG PERENCANAAN DAN PENGENDALIAN REGIONAL JAWA BAGIAN BARAT DIVISI PENGEMBANGAN REGIONAL JAWA BAGIAN BARAT DIREKTORAT BISNIS REGIONAL JAWA BAGIAN BARAT PT PLN (PERSERO) KANTOR PUSAT';
        $forjab->formasi ='Deputi Manajer';
        $forjab->jabatan ='Perencanaan Regional';
        $forjab->jenjang_id ='MD';
        $forjab->jenjang_txt ='Manajemen Dasar';
        $forjab->pagu =1;
        $forjab->level ='UI';
        // $forjab->realisasi =1;
        $forjab->spfj ='0037.P/DIR/2016';
        $forjab->status_fj ='';
        $forjab->personnel_area_id = PersonnelArea::where('nama_pendek', 'DISJABAR')->first()->id;
        $forjab->save();

        $forjab = new FormasiJabatan;
        $forjab->id = Uuid::generate();
        $forjab->kode_olah = 'DITHCM-1516650301.MM';
        $forjab->legacy_code = '1516650301';
        $forjab->posisi = 'DIVISI PENGEMBANGAN TALENTA DIREKTORAT HUMAN CAPITAL MANAGEMENT PT PLN (PERSERO) KANTOR PUSAT';
        $forjab->formasi ='Manajer Senior';
        $forjab->jabatan ='Rekrutmen dan Seleksi';
        $forjab->jenjang_id ='MM';
        $forjab->jenjang_txt ='Manajemen Menengah';
        $forjab->pagu =1;
        $forjab->level ='KP';
        // $forjab->realisasi =1;
        $forjab->spfj ='0032.P/DIR/2017';
        $forjab->status_fj ='';
        $forjab->personnel_area_id = PersonnelArea::where('username', 'karir2')->first()->id;;
        $forjab->save();

        $forjab = new FormasiJabatan;
        $forjab->id = Uuid::generate();
        $forjab->kode_olah = 'DITHCM-151665030401.F05';
        $forjab->legacy_code = '151665030401';
        $forjab->posisi = 'SUB BIDANG PENGELOLAAN KARIR DAN TALENTA BIDANG PENGELOLAAN KARIR DAN TALENTA II DIVISI PENGEMBANGAN TALENTA DIREKTORAT HUMAN CAPITAL MANAGEMENT PT PLN (PERSERO) KANTOR PUSAT';
        $forjab->formasi ='Assistant Analyst';
        $forjab->jabatan ='Pengelolaan Karir';
        $forjab->jenjang_id ='05';
        $forjab->jenjang_txt ='Fungsional V';
        $forjab->pagu =1;
        $forjab->level ='KP';
        // $forjab->realisasi =1;
        $forjab->spfj ='0032.P/DIR/2017';
        $forjab->status_fj ='';
        $forjab->personnel_area_id = PersonnelArea::where('username', 'sdm')->first()->id;
        $forjab->save();

    }
}