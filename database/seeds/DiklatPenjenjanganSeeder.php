<?php

use Illuminate\Database\Seeder;
use App\DiklatPenjenjangan;

class DiklatPenjenjanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dikpen = new DiklatPenjenjangan;
        $dikpen->id = Uuid::generate();
        $dikpen->nama = 'Unit Oke';
        $dikpen->nama_pendek = 'UNIKE';
        $dikpen->username = 'unike';
        $dikpen->password = bcrypt('unike');
        $dikpen->direktorat_id = $dir->id;
        $dikpen->user_role = 1;
        $dikpen->save();
    }
}
 $table->uuid('id');
            $table->string('jenis_diklat');
            $table->date('tanggal_usulan');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_lulus');
            $table->decimal('nilai', 5);
            $table->char('grade', 2);
            $table->string('nomor_sertifikat')->unique()->nullable();
            $table->string('hasil_nilai_assesment');
            $table->char('pegawai_id', 36);
            $table->timestamps();

            $table->index(['pegawai_id']);