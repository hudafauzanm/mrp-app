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
        $this->call(DirektoratSeeder::class);
        $this->call(PersonnelAreaSeeder::class);
        $this->call(FormasiJabatanSeeder::class);
        $this->call(PegawaiSeeder::class);
        // $this->call(MRPTableSeeder::class);
        // $this->call(DiklatPenjenjanganSeeder::class);
        // $this->call(SKSTGSeeder::class);
        // $this->call(DiklatPenjenjanganSeeder::class);
        // $this->call(FRSSeeder::class);
        // $this->call(PenilaianPegawaiSeeder::class);
        $this->call(ProvinsiKotaSeeder::class);
    }
}