<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSKSTgsTable extends Migration
{
    protected $tablename = 'sk_stg';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($tablename, function (Blueprint $table) {
            $table->uuid('id');
            $table->string('no_dokumen_proses_sk');
            $table->string('tahun_sk');
            $table->string('no_sk')->unique();
            $table->string('no_dokumen_kirim_sk')->unique();
            $table->string('tanggal_kirim_sk');
            $table->string('tanggal_aktivasi');//di erd date
            $table->string('no_stg')->unique();

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
        Schema::dropIfExists($tablename);
    }
}
