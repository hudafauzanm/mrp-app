<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaianPegawaisTable extends Migration
{
    public $tablename = 'penilaian_pegawai';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nilai');
            $table->string('tindak_lanjut_pengembangan');
            $table->char('pegawai_id', 36);
            $table->integer('aspek_penilaian_id');
            $table->timestamps();

            $table->index(['pegawai_id', 'aspek_penilaian_id']);
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
