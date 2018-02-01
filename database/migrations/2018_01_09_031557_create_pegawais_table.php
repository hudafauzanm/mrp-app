<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    public $tablename = 'pegawai';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->uuid('id');
            $table->string('perner')->unique();
            $table->string('nip')->unique();
            $table->string('no_hp')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('kota_asal')->nullable();
            $table->string('status_domisili')->nullable();
            $table->string('nama_pegawai');
            $table->string('employee_subgroup');
            $table->string('ps_group')->nullable();
            $table->integer('talent_pool_position')->nullable();
            $table->date('tanggal_grade');
            $table->date('tanggal_lahir');
            $table->date('tanggal_masuk');
            $table->date('tanggal_capeg');
            $table->date('tanggal_pegawai');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('kali_jenjang')->nullable();
            $table->date('tanggal_unit_induk_akhir')->nullable();
            $table->string('nip_sutri')->nullable();
            $table->string('lc_atasan')->nullable();
            // $table->string('nip_atasan');
            $table->string('top_unit')->nullable();
            $table->string('top_0')->nullable();
            $table->string('top_1')->nullable();
            $table->string('top_2')->nullable();
            $table->string('top_3')->nullable();
            $table->char('formasi_jabatan_id',36);

            $table->timestamps();

            $table->index(['formasi_jabatan_id']);


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
