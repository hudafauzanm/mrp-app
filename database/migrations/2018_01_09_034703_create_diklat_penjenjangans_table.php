<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiklatPenjenjangansTable extends Migration
{
    protected $tablename = 'diklat_penjenjangan';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($tablename, function (Blueprint $table) {
            $table->uuid('id');
            $table->string('jenis_diklat');
            $table->date(format)('tanggal_usulan');
            // $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->char('tbl_pegawai', 36);
            $table->timestamps();

            $table->index(['tbl_pegawai']);
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
