<?php

use Illuminate\Database\Seeder;
use App\FormasiJabatan;

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
        $forjab->kode_olah = 'DITHCM-15166501.MA';
        $forjab->legacy_code = '15166501';
        $forjab->posisi = 'DIREKTORAT HUMAN CAPITAL MANAGEMENT PT PLN (PERSERO) KANTOR PUSAT';
        $forjab->formasi ='Kepala Divisi';
        $forjab->jabatan ='Pengembangan Organisasi';
        $forjab->jenjang_id ='MA';
        $forjab->jenjang_txt ='Manajemen Atas';
        $forjab->pagu ='';
        $forjab->realisasi ='';
        $forjab->spfj ='0032.P/DIR/2017';
        $forjab->status_fj ='';
        $forjab->personnel_area_id = $user->id;
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
        $forjab->pagu ='';
        $forjab->realisasi ='';
        $forjab->spfj ='0037.P/DIR/2016';
        $forjab->status_fj ='';
        $forjab->personnel_area_id = $user->id;
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
        $forjab->pagu ='';
        $forjab->realisasi ='';
        $forjab->spfj ='0037.P/DIR/2016';
        $forjab->status_fj ='';
        $forjab->personnel_area_id = $user->id;
        $forjab->save();

    }
}