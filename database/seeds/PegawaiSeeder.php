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
        $pegawai->perner = '';
        $pegawai->nip = '';
        $pegawai->no_hp = '';
        $pegawai->email = '';
        $pegawai->kota_asal = '';
        $pegawai->status_domisili = '';
        $pegawai->nama_pegawai = '';
        $pegawai->employee_subgroup = '';
        $pegawai->ps_group = '';
        $pegawai->talent_pool_position = '';
        $pegawai->tanggal_grade = '';
        $pegawai->tanggal_lahir = '';
        $pegawai->tanggal_masuk = '';
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
