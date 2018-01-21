<?php

use Illuminate\Database\Seeder;
use App\PersonnelArea;
use App\Direktorat;

class PersonnelAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // unit
        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'DIVISI PERIZINAN DAN PERTANAHAN DIREKTORAT PENGADAAN';
        $user->nama_pendek = 'DIVPPT';
        $user->username = 'divppt1';
        $user->password = bcrypt('divppt');
        $user->direktorat_id = Direktorat::first()->id;
        $user->user_role = 1;
        $user->save();

        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'DIVISI PENGADAAN STRATEGIS DIREKTORAT PENGADAAN PT PLN (PERSERO) KANTOR PUSAT';
        $user->nama_pendek = 'DIVDAS';
        $user->username = 'divdas';
        $user->password = bcrypt('divdas');
        $user->direktorat_id = Direktorat::first()->id;
        $user->user_role = 1;
        $user->save();

        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'DISTRIBUSI JAWA BARAT';
        $user->nama_pendek = 'DISJABAR';
        $user->username = 'disjabar';
        $user->password = bcrypt('disjabar');
        $user->direktorat_id = Direktorat::where('nama_pendek', 'DITREG-JBB')->first()->id;
        $user->user_role = 1;
        $user->save();

        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'DIVISI PENGEMBANGAN TALENTA';
        $user->nama_pendek = 'DIVTLN';
        $user->username = 'divtln';
        $user->password = bcrypt('divtln');
        $user->direktorat_id = Direktorat::skip(1)->first()->id;
        $user->user_role = 1;
        $user->save();

        // SDM
        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'SDM';
        $user->nama_pendek = 'SDM';
        $user->username = 'sdm';
        $user->password = bcrypt('sdm');
        $user->direktorat_id = Direktorat::skip(2)->first()->id;
        $user->user_role = 3;
        $user->save();

        // karir2
        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'Karir 2';
        $user->nama_pendek = 'Karir 2';
        $user->username = 'karir2';
        $user->password = bcrypt('karir2');
        $user->direktorat_id = Direktorat::skip(3)->first()->id;
        $user->user_role = 2;
        $user->save();
    }
}
