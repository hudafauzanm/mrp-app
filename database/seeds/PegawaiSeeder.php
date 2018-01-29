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
        // $pegawai->nip_atasan = 'test';
        $pegawai->nip_sutri = '5115115115';
        $pegawai->kali_jenjang = 1;
        // $pegawai->tanggal_jab_unit_akhir = Carbon::parse('2013-07-17');
        $pegawai->tanggal_unit_induk_akhir = Carbon::parse('2013-07-17');
        $pegawai->formasi_jabatan_id = FormasiJabatan::where('kode_olah', 'DITREG-JBB-1516730101.MM')->first()->id;
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
        // $pegawai->nip_atasan = 'test';
        $pegawai->nip_sutri = '5115100006';
        $pegawai->kali_jenjang = 1;
        // $pegawai->tanggal_jab_unit_akhir = Carbon::parse('2013-07-17');
        $pegawai->tanggal_unit_induk_akhir = Carbon::parse('2013-07-17');
        $pegawai->formasi_jabatan_id = FormasiJabatan::where('kode_olah', 'DITDAN-151664020101.F04')->first()->id;
        $pegawai->save();

        $pegawai = new Pegawai;
        $pegawai->id = Uuid::generate();
        $pegawai->perner = '79060600';
        $pegawai->nip = '7906091Z';
        $pegawai->no_hp = '081234567123';
        $pegawai->email = 'endahc@gmail.com';
        $pegawai->kota_asal = 'Jakarta';
        // $pegawai->status_domisili = 'Daerah C';
        $pegawai->nama_pegawai = 'Y ENDAH CAHYANINGRUM';
        $pegawai->employee_subgroup = 'Struktural';
        $pegawai->ps_group = 'SYS03';
        // $pegawai->talent_pool_position = '1';
        $pegawai->tanggal_grade = Carbon::parse('2016-07-01');
        $pegawai->tanggal_lahir = Carbon::parse('1979-10-06');
        $pegawai->tanggal_masuk = Carbon::parse('2006-01-01');
        $pegawai->tanggal_capeg = Carbon::parse('2006-01-01');
        $pegawai->tanggal_pegawai = Carbon::parse('2006-01-01');
        $pegawai->start_date = Carbon::parse('2017-11-01');
        $pegawai->end_date = Carbon::parse('');
        $pegawai->lc_atasan = 'test';
        // $pegawai->nip_atasan = 'test';
        $pegawai->nip_sutri = '';
        $pegawai->kali_jenjang = 2;
        // $pegawai->tanggal_jab_unit_akhir = Carbon::parse('2017-11-01');
        $pegawai->tanggal_unit_induk_akhir = Carbon::parse('2017-11-01');
        $pegawai->formasi_jabatan_id = FormasiJabatan::where('kode_olah', 'DITREG-JBB-151673010101.MD')->first()->id;
        $pegawai->save();

        $pegawai = new Pegawai;
        $pegawai->id = Uuid::generate();
        $pegawai->perner = '123456';
        $pegawai->nip = '123456SDM';
        $pegawai->no_hp = '08943171282';
        $pegawai->email = 'sdm@gmail.com';
        $pegawai->kota_asal = 'Jakarta';
        // $pegawai->status_domisili = 'Daerah C';
        $pegawai->nama_pegawai = 'AKU ORANG SDM';
        $pegawai->employee_subgroup = 'Struktural';
        $pegawai->ps_group = 'SYS03';
        // $pegawai->talent_pool_position = '1';
        $pegawai->tanggal_grade = Carbon::parse('2016-07-01');
        $pegawai->tanggal_lahir = Carbon::parse('1979-10-06');
        $pegawai->tanggal_masuk = Carbon::parse('2006-01-01');
        $pegawai->tanggal_capeg = Carbon::parse('2006-01-01');
        $pegawai->tanggal_pegawai = Carbon::parse('2006-01-01');
        $pegawai->start_date = Carbon::parse('2017-11-01');
        $pegawai->end_date = Carbon::parse('2021-10-10');
        $pegawai->lc_atasan = 'test';
        // $pegawai->nip_atasan = 'test';
        $pegawai->nip_sutri = '';
        $pegawai->kali_jenjang = 2;
        // $pegawai->tanggal_jab_unit_akhir = Carbon::parse('2017-11-01');
        $pegawai->tanggal_unit_induk_akhir = Carbon::parse('2017-11-01');
        $pegawai->formasi_jabatan_id = FormasiJabatan::where('kode_olah', 'DITHCM-151665030401.F05')->first()->id;
        $pegawai->save();

        $pegawai = new Pegawai;
        $pegawai->id = Uuid::generate();
        $pegawai->perner = '1234562';
        $pegawai->nip = 'karir2';
        $pegawai->no_hp = '089431282';
        $pegawai->email = 'karir2@gmail.com';
        $pegawai->kota_asal = 'Jakarta';
        // $pegawai->status_domisili = 'Daerah C';
        $pegawai->nama_pegawai = 'AKU ORANG karir2';
        $pegawai->employee_subgroup = 'Struktural';
        $pegawai->ps_group = 'SYS03';
        // $pegawai->talent_pool_position = '1';
        $pegawai->tanggal_grade = Carbon::parse('2016-07-01');
        $pegawai->tanggal_lahir = Carbon::parse('1979-10-06');
        $pegawai->tanggal_masuk = Carbon::parse('2006-01-01');
        $pegawai->tanggal_capeg = Carbon::parse('2006-01-01');
        $pegawai->tanggal_pegawai = Carbon::parse('2006-01-01');
        $pegawai->start_date = Carbon::parse('2017-11-01');
        $pegawai->end_date = Carbon::parse('2021-10-10');
        $pegawai->lc_atasan = 'test';
        // $pegawai->nip_atasan = 'test';
        $pegawai->nip_sutri = '';
        $pegawai->kali_jenjang = 2;
        // $pegawai->tanggal_jab_unit_akhir = Carbon::parse('2017-11-01');
        $pegawai->tanggal_unit_induk_akhir = Carbon::parse('2017-11-01');
        $pegawai->formasi_jabatan_id = FormasiJabatan::where('kode_olah', 'DITHCM-1516650301.MM')->first()->id;
        $pegawai->save();
    }
}
