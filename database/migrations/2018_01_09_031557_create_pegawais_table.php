<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    protected $tablename = 'pegawai'
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($table, function (Blueprint $table) {
            $table->string('perner')->primary();
            $table->string('nip')->unique();
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('kota_asal');
            $table->string('status_domisili');
            $table->string('nama_pegawai');
            $table->string('employee_group');
            $table->string('employee_subgroup');
            $table->string('ps_group')->nullable();
            $table->string('jenjang_main_grp_id');
            $table->string('jenjang_main_grp_txt');
            $table->string('jenjang_sub_grp_id');
            $table->string('jenjang_sub_grp_txt');
            $table->int('talent_pool_position')->nullable();
            $table->date('tanggal_grade')->nullable();
            $table->date('tanggal_lahir');
            $table->date('tanggal_masuk');
            $table->date('tanggal_capeg');
            $table->date('tanggal_pegawai');
            $table->date('start_date');
            $table->date('end_date');
            $table->int('lc_atasan');
            $table->string('nip_atasan');
            $table->string('top_unit');
            $table->string('top_0');
            $table->string('top_1');
            $table->string('top_2');
            $table->string('top_3');
            $table->string('nip_sutri')->unique();
            $table->int('kali_jenjang');
            $table->date('tanggal_jab_unit_akhir');
            $table->date('tanggal_unit_induk_akhir');
            $table->char('formasijabatan_id',36)

            $table->timestamps();

            $table->index(['formasijabatan_id'])


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
