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

    }
}