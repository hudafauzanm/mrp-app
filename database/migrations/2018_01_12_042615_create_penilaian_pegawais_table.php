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
            $table->integer('team_work');
            $table->integer('bahasa_1_nilai');
            $table->integer('bahasa_2_nilai');
            $table->string('bahasa_3')->nullable();
            $table->integer('bahasa_3_nilai')->nullable();
            $table->string('kesehatan');
            $table->string('career_willingness');
            $table->string('external_rediness');
            $table->string('hubungan_sesama');
            $table->string('hubungan_atasan');
            $table->char('mrp_id', 36)->nullable();
            $table->timestamps();

            $table->index(['pegawai_id', 'mrp_id']);
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
