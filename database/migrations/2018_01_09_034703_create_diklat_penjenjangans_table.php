<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiklatPenjenjangansTable extends Migration
{
    public $tablename = 'diklat_penjenjangan';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->uuid('id');
            $table->char('tbl_pegawai', 36);
            $table->string('jenis_diklat');
            $table->date('tanggal_usulan');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_lulus');
            $table->decimal('nilai');
            $table->string('grade');
            $table->string('nomor_sertifikat')->unique()->nullable();
            $table->string('hasil_nilai_assesment');
            $table->timestamps();

            $table->index(['tbl_pegawai']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tablename);
    }
}
