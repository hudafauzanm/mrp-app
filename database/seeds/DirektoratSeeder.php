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
        $dir->nama = 'Direktorat Pengadaan Strategis';
        $dir->nama_pendek = 'DITDAN';
        $dir->save();

        $dir = new Direktorat;
        $dir->id = Uuid::generate();
        $dir->nama = 'Direktorat Human Capital and Management';
        $dir->nama_pendek = 'DITHCM';
        $dir->save();

        $dir = new Direktorat;
        $dir->id = Uuid::generate();
        $dir->nama = 'Direktorat Keuangan';
        $dir->nama_pendek = 'DITKEU';
        $dir->save();

        $dir = new Direktorat;
        $dir->id = Uuid::generate();
        $dir->nama = 'DIREKTORAT BISNIS REGIONAL JAWA BAGIAN BARAT';
        $dir->nama_pendek = 'DITREG-JBB';
        $dir->save();

        $dir = new Direktorat;
        $dir->id = Uuid::generate();
        $dir->nama = ' DIREKTORAT BISNIS REGIONAL JAWA BAGIAN TENGAH';
        $dir->nama_pendek = 'DITREG-JBT';
        $dir->save();

        $dir = new Direktorat;
        $dir->id = Uuid::generate();
        $dir->nama = 'DIREKTORAT BISNIS REGIONAL JAWA BAGIAN TIMUR DAN BALI';
        $dir->nama_pendek = 'DITREG-JBTB';
        $dir->save();

        $dir = new Direktorat;
        $dir->id = Uuid::generate();
        $dir->nama = 'DIREKTORAT BISNIS REGIONAL KALIMANTAN';
        $dir->nama_pendek = 'DITREG-KAL';
        $dir->save();

        $dir = new Direktorat;
        $dir->id = Uuid::generate();
        $dir->nama = 'DIREKTORAT BISNIS REGIONAL MALUKU DAN PAPUA';
        $dir->nama_pendek = 'DITREG-MP';
        $dir->save();

        $dir = new Direktorat;
        $dir->id = Uuid::generate();
        $dir->nama = 'DIREKTORAT BISNIS REGIONAL SULAWESI DAN NUSA TENGGARA';
        $dir->nama_pendek = 'DITREG-SNT';
        $dir->save();

        $dir = new Direktorat;
        $dir->id = Uuid::generate();
        $dir->nama = 'DIREKTORAT BISNIS REGIONAL SUMATERA';
        $dir->nama_pendek = 'DITREG-SUM';
        $dir->save();

        $dir = new Direktorat;
        $dir->id = Uuid::generate();
        $dir->nama = 'DIREKTORAT PERENCANAAN KORPORAT';
        $dir->nama_pendek = 'DITREN';
        $dir->save();

        $dir = new Direktorat;
        $dir->id = Uuid::generate();
        $dir->nama = '';
        $dir->nama_pendek = 'SATUAN';
        $dir->save();
    }
}
