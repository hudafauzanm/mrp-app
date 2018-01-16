<?php

use Illuminate\Database\Seeder;
use App\Pegawai;
use App\FormasiJabatan;
use Carbon\Carbon;

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
        $pegawai->email = 'hero@gmail.com';
        $pegawai->kota_asal = 'Jember';
        // $pegawai->status_domisili = 'Daerah C';
        $pegawai->nama_pegawai = 'Hero Akbar Ahmadi';
        $pegawai->employee_subgroup = 'Struktural';
        $pegawai->ps_group = 'SYS04';
        // $pegawai->talent_pool_position = '1';
        $pegawai->tanggal_grade = Carbon::parse('2017-12-10');
        $pegawai->tanggal_lahir = Carbon::parse('1995-08-01');
        $pegawai->tanggal_masuk = Carbon::parse('2010-07-07');
        $pegawai->tanggal_capeg = Carbon::parse('2010-07-09');
        $pegawai->tanggal_pegawai = Carbon::parse('2010-07-10');
        $pegawai->start_date = Carbon::parse('2010-07-10');
        $pegawai->end_date = Carbon::parse('2051-08-01');
        $pegawai->lc_atasan = 'test';
        $pegawai->nip_atasan = 'test';
        $pegawai->nip_sutri = '5115115115';
        $pegawai->kali_jenjang = 1;
        $pegawai->tanggal_jab_unit_akhir = Carbon::parse('2013-07-17');
        $pegawai->tanggal_unit_induk_akhir = Carbon::parse('2013-07-17');
        $pegawai->formasi_jabatan_id = FormasiJabatan::skip(2)->first()->id;
        $pegawai->save();

        $pegawai = new Pegawai;
        $pegawai->id = Uuid::generate();
        $pegawai->perner = '8176128';
        $pegawai->nip = '5115115115';
        $pegawai->no_hp = '0821343435514';
        $pegawai->email = 'dia@gmail.com';
        $pegawai->kota_asal = 'Sana';
        // $pegawai->status_domisili = 'Daerah C';
        $pegawai->nama_pegawai = 'Istrinya Hero';
        $pegawai->employee_subgroup = 'Struktural';
        $pegawai->ps_group = 'SYS04';
        // $pegawai->talent_pool_position = '1';
        $pegawai->tanggal_grade = Carbon::parse('2017-12-10');
        $pegawai->tanggal_lahir = Carbon::parse('1995-08-01');
        $pegawai->tanggal_masuk = Carbon::parse('2010-07-07');
        $pegawai->tanggal_capeg = Carbon::parse('2010-07-09');
        $pegawai->tanggal_pegawai = Carbon::parse('2010-07-10');
        $pegawai->start_date = Carbon::parse('2010-07-10');
        $pegawai->end_date = Carbon::parse('2051-08-01');
        $pegawai->lc_atasan = 'test';
        $pegawai->nip_atasan = 'test';
        $pegawai->nip_sutri = '5115100006';
        $pegawai->kali_jenjang = 1;
        $pegawai->tanggal_jab_unit_akhir = Carbon::parse('2013-07-17');
        $pegawai->tanggal_unit_induk_akhir = Carbon::parse('2013-07-17');
        $pegawai->formasi_jabatan_id = FormasiJabatan::skip(1)->first()->id;
        $pegawai->save();
    }
}
