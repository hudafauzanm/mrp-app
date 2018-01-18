<?php

use Illuminate\Database\Seeder;
use App\Kota;
use App\Provinsi;

class ProvinsiKotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //provinsi 1
        $provinsi = new Provinsi;
        $kota = new Kota;

        $provinsi->provinsi = 'Banten';
        $provinsi->save();
        //kota 1 & provinsi 1
        $kota->kota = 'Pandeglang';
        $kota->provinsi_id = $provinsi->id;
        $kota->save();
        //kata 2 & provinsi 1
        $kota = new Kota;
        $kota->kota = 'Serang';
        $kota->provinsi_id = $provinsi->id;
        $kota->save();


        //provinsi2
        $provinsi = new Provinsi;
        $kota = new Kota;

        $provinsi->provinsi = 'DKI Jakarta';
        $provinsi->save();
        //kota 3 & provinsi 2
        $kota->kota = 'Tebet';
        $kota->provinsi_id = $provinsi->id;
        $kota->save();
        //kota 4 & provinsi 2
        $kota = new Kota;
        $kota->kota = 'Tanah Abang';
        $kota->provinsi_id = $provinsi->id;
        $kota->save(); 
    }
}
