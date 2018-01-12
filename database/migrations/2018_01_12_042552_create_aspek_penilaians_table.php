<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAspekPenilaiansTable extends Migration
{
    public $tablename = 'aspek_penilaian';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($tablename, function (Blueprint $table) {
            $table->increments('id');
            $table->string('aspek');
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
        Schema::dropIfExists($tablename);
    }
}
