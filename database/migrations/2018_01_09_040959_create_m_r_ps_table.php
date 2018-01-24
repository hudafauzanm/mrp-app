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
            // perubahan:
            // no_dokumen_unit_asal -> no_dokumen_unit_usul
            // tgl_dokumen_unit_asal -> tgl_dokumen_unit_usul
            // no_dokumen_unit_mutasi -> no_dokumen_unit_jawab
            // tgl_dokumen_unit_mutasi -> tgl_dokumen_unit_jawab
            // no_dokumen_mutasi -> no_dokumen_respon_sdm
            // tgl_dokumen_mutasi -> tgl_dokumen_respon_sdm

            // penambahan:
            // tanggal_aktivasi
            // filename_dokumen_unit_usul
            // filename_dokumen_unit_jawab
            // filename_dokumen_respon_sdm
            $table->uuid('id');
            $table->string('registry_number');
            $table->string('jenis_mutasi')->nullable();
            $table->string('mutasi')->nullable();
            $table->string('jalur_mutasi')->nullable();
            $table->string('alasan_mutasi')->nullable();
            $table->char('unit_pengusul', 36);
            $table->string('no_dokumen_unit_usul')->nullable();
            $table->string('filename_dokumen_unit_usul')->nullable();
            $table->date('tgl_dokumen_unit_usul')->nullable();
            $table->string('no_dokumen_unit_jawab')->nullable();
            $table->string('filename_dokumen_unit_jawab')->nullable();
            $table->date('tgl_dokumen_unit_jawab')->nullable();
            $table->string('no_dokumen_respon_sdm')->nullable();
            $table->string('filename_dokumen_respon_sdm')->nullable();
            $table->date('tgl_dokumen_mutasi')->nullable();
            $table->date('tgl_evaluasi')->nullable();
            $table->date('tgl_aktivasi')->nullable();
            $table->date('tgl_pooling')->nullable();
            $table->integer('tipe')->nullable();
            $table->integer('status')->default(1);
            $table->string('tindak_lanjut')->nullable();
            $table->char('sk_stg_id',36)->nullable();
            $table->char('pegawai_id',36)->nullable();
            $table->string('nip_pengusul');
            $table->string('nip_operator');
            $table->char('formasi_jabatan_id',36)->nullable();
            $table->timestamps();
            

            $table->index(['pegawai_id']);
            $table->index(['sk_stg_id']);
            $table->index(['formasi_jabatan_id']);
            $table->index(['unit_pengusul']);
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
