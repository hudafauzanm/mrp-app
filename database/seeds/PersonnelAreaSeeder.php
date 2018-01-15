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

        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'Unit Oke';
        $user->nama_pendek = 'UNIKE';
        $user->username = 'unike';
        $user->password = bcrypt('unike');
        $user->direktorat_id = Direktorat::first()->id;
        $user->user_role = 1;
        $user->save();

        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'Unit 2';
        $user->nama_pendek = 'UNIKEA';
        $user->username = 'unikea';
        $user->password = bcrypt('unikea');
        $user->direktorat_id = Direktorat::skip(1)->first()->id;
        $user->user_role = 4;
        $user->save();

        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'SDM';
        $user->nama_pendek = 'SDM';
        $user->username = 'sdm';
        $user->password = bcrypt('sdm');
        $user->direktorat_id = Direktorat::skip(2)->first()->id;
        $user->user_role = 3;
        $user->save();

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
