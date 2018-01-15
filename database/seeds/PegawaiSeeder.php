<?php

use Illuminate\Database\Seeder;
use App\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegawai = new Pegawai;
        $pegawai->id = Uuid::generate();
        $pegawai->perner = '12345321';
        $pegawai->nip = '5115100006';
        $pegawai->no_hp = '082134343434';
        $pegawai->email = 'hero.imut@gmail.com';
        $pegawai->kota_asal = 'Jember';
        $pegawai->status_domisili = 'Daerah C';
        $pegawai->nama_pegawai = 'Hero Akbar Ahmadi';
        $pegawai->employee_subgroup = 'Struktural';
        $pegawai->ps_group = 'SYS04';
        $pegawai->talent_pool_position = '151666060101';
        $pegawai->tanggal_grade = '12.10.2017';
        $pegawai->tanggal_lahir = '01.08.1995';
        $pegawai->tanggal_masuk = '07.07.2016';
        $pegawai->tanggal_pegawai = '';
        $pegawai->start_date = '';
        $pegawai->end_date = '';
        $pegawai->lc_atasan = '';
        $pegawai->nip_atasan = '';
        $pegawai->top_unit = '';
        $pegawai->top_0 = '';
        $pegawai->top_1 = '';
        $pegawai->top_2 = '';
        $pegawai->top_3 = '';
        $pegawai->nip_sutri = '';
        $pegawai->kali_jenjang = '';
        $pegawai->tanggal_jab_unit_akhir = '';
        $pegawai->tanggal_unit_induk_akhir = '';
        $pegawai->formasi_jabatan_id = $forjab->id;
        $pegawai->save();
    }
}
