<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormasiJabatansTable extends Migration
{
    protected $table = 'formasi_jabatan';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($table, function (Blueprint $table) {
            $table->uuid('id');
            $table->string('kode_olah')->unique();
            $table->string('legacy_code');
            $table->string('unit_div_satuan')->nullable();
            $table->string('formasi');
            $table->string('jabatan');
            $table->string('jenjang');
            $table->string('jenjang_txt')->nullable();
            $table->string('nomor_spfj');
            $table->int('pagu');
            $table->int('realisasi');
            $table->int('status_fj')->nullable();
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
        Schema::dropIfExists($table);
    }
}
