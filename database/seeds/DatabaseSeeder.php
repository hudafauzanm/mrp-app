<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AspekPenilaianSeeder::class);
        $this->call(DiklatPenjenjanganSeeder::class);
        $this->call(DirektoratsSeeder::class);
        $this->call(FormasiJabatanSeeder::class);
        $this->call(FRSSeeder::class);
        $this->call(MRPTablenSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(PenilaianPegawaiSeeder::class);
        $this->call(PersonnelAreaSeeder::class);
    }
}