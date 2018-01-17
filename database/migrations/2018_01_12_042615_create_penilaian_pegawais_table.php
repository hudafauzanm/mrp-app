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
            $table->char('pegawai_id', 36);
            $table->integer('creative');
            $table->integer('enthusiastic');
            $table->integer('building');
            $table->integer('strategic');
            $table->integer('customer');
            $table->integer('driving');
            $table->integer('visionary');
            $table->integer('empowering');
            $table->integer('komunikasi');
            $table->integer('teamwork');
            $table->string('bahasa_1');
            $table->integer('bahasa_1_nilai');
            $table->string('bahasa_2');
            $table->integer('bahasa_2_nilai');
            $table->string('bahasa_3');
            $table->integer('bahasa_3_nilai');
            $table->integer('kesehatan');
            $table->integer('career_willingness');
            $table->integer('external_rediness');
            $table->integer('hubungan_sesama');
            $table->timestamps();

            $table->index('pegawai_id');
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
