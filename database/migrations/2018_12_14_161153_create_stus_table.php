<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasTable('stus'))) {
        Schema::create('stus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('dob');
            $table->string('department');
            $table->string('designation');
            $table->string('agecount');
            $table->string('salary');
            $table->string('image');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stus');
    }
}
