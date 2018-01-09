<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFRSTable extends Migration
{
    public $tablename = 'frs';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('perner')->unique();
            $table->string('tingkat');
            $table->string('bidang_profesi');
            $table->string('jurusan');
            $table->string('konsentrasi');
            $table->string('tindaklanjut')->nullable();
            $table->string('source');
            $table->string('lt');
            $table->string('hasil_penjabatan');
            $table->string('tahun_sk');
            $table->string('tgl_pegawai_tetap');
            $table->string('no_sk')->unique();
            $table->string('instansi_akademik');
            $table->timestamps();
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
