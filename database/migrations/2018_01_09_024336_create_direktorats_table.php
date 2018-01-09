<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirektoratsTable extends Migration
{
    protected $table = 'direktorat';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($table, function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nama');
            $table->string('nama_pendek')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direktorats');
    }
}
