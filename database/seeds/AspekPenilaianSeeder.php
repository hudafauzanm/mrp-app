<?php

use Illuminate\Database\Seeder;
use App\AspekPenilaian;

class AspekPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$aspen = new AspekPenilaian;

        $aspen->aspek = 'KompetensiHarian';
        $aspen->save();

        $aspen = new AspekPenilaian;
     
        $aspen->aspek = 'KompetensiHarian';
        $aspen->save();

        $aspen = new AspekPenilaian;
      
        $aspen->aspek = 'PenilaianAtasan';
        $aspen->save();
    }
}