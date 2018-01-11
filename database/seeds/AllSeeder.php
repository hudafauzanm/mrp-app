<?php

use Illuminate\Database\Seeder;
use App\PersonnelArea;
use App\Direktorat;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$dir = new Direktorat;
    	$dir->id = Uuid::generate();
    	$dir->nama = 'Direktorat Sip';
    	$dir->nama_pendek = 'DIRSIP';
    	$dir->save();

        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'Unit Oke';
        $user->nama_pendek = 'UNIKE';
        $user->username = 'unike';
        $user->password = bcrypt('unike');
        $user->direktorat_id = $dir->id;
        $user->user_role = 1;
        $user->save();

        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'SDM';
        $user->nama_pendek = 'SDM';
        $user->username = 'sdm';
        $user->password = bcrypt('sdm');
        $user->direktorat_id = $dir->id;
        $user->user_role = 3;
        $user->save();

        $user = new PersonnelArea;
        $user->id = Uuid::generate();
        $user->nama = 'Karir 2';
        $user->nama_pendek = 'Karir 2';
        $user->username = 'karir2';
        $user->password = bcrypt('karir2');
        $user->direktorat_id = $dir->id;
        $user->user_role = 2;
        $user->save();
    }
}
