<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelAreasTable extends Migration
{
    public $tablename = 'personnel_area';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nama');
            $table->string('nama_pendek')->nullable();
            // $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('user_role')->default(3);
            $table->string('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->char('direktorat_id', 36);
            // $table->rememberToken();
            $table->timestamps();

            $table->index(['direktorat_id']);
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
