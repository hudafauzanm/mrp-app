<?php

use Illuminate\Database\Seeder;
use App\Direktorat;

class DirektoratSeeder extends Seeder
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
    }
}
