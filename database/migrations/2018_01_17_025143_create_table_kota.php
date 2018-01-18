<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKota extends Migration
{
    public $tablename = 'kota';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create($this->tablename, function (Blueprint $table) {
            $table->increments('id');
            $table->string('kota', 100);
            $table->char('provinsi_id',36);
            $table->timestamps();

            $table->index('provinsi_id');
            });
        //
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
