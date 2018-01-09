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
            $table->string('no_dokumen_proses_sk')->unique();
            $table->string('tahun_sk');
            $table->string('no_sk')->unique();
            $table->string('no_dokumen_kirim_sk')->unique();
            $table->date('tanggal_kirim_sk');
            $table->date('tanggal_aktivasi');//di erd date
            $table->string('no_stg')->unique();

            $table->timestamps();

            $table->index(['sk_stg_id']);
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
