<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMRPsTable extends Migration
{
    public $tablename = 'mrp';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->uuid('id');
            $table->string('registry_number');
            $table->string('jenis_mutasi');
            $table->string('mutasi');
            $table->string('jalur_mutasi');
            $table->string('no_dokumen_unit_asal');
            $table->date('tgl_dokumen_unit_asal');
            $table->string('alasan_mutasi');
            $table->string('no_dokumen_unit_mutasi')->nullable();
            $table->date('tgl_dokumen_unit_mutasi')->nullable();
            $table->date('tgl_evaluasi')->nullable();
            $table->date('tgl_pooling')->nullable();
            $table->string('no_dokumen_mutasi')->nullable();
            $table->date('tgl_dokumen_mutasi')->nullable();
            $table->integer('status')->default(1);
            $table->string('tindak_lanjut')->nullable();
            $table->char('sk_stg_id',36)->nullable();
            $table->char('pegawai_id',36);
            $table->timestamps();
            

            $table->index(['pegawai_id']);
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
        Schema::dropIfExists($this->tablename);
    }
}
