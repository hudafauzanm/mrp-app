<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSKSTgsTable extends Migration
{
    public $tablename = 'sk_stg';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            // penambahan:
            // filename_dokumen_proses_sk
            // no_dokumen_proses_sk ???
            
            $table->uuid('id');
            $table->string('tahun_sk');
            $table->string('no_sk')->unique();
            $table->string('no_dokumen_kirim_sk')->unique();
            $table->string('filename_dokumen_sk')->unique();
            $table->date('tgl_kirim_sk');
            $table->date('tgl_aktivasi');
            $table->string('no_stg')->unique()->nullable();
            $table->char('mrp_id',36);

            $table->timestamps();

            $table->index(['mrp_id']);

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
