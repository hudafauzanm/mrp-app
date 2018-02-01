<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormasiJabatansTable extends Migration
{
    public $tablename = 'formasi_jabatan';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->uuid('id');
            $table->string('kode_olah');
            $table->string('legacy_code')->nullable();
            $table->string('level');
            $table->string('posisi');
            $table->string('kelas_unit')->nullable();
            $table->string('hgl')->nullable();
            $table->string('formasi');
            $table->string('jabatan');
            $table->string('jenjang_id');
            $table->string('jenjang_txt');
            // $table->string('nomor_spfj');
            $table->integer('pagu');
            // $table->integer('realisasi'); diambil dari pegawai
            $table->string('spfj')->nullable();
            $table->string('status_fj')->nullable();
            $table->char('personnel_area_id', 36);
            $table->timestamps();

            $table->index(['personnel_area_id']);
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
