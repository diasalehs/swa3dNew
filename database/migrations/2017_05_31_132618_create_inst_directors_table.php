<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inst_directors', function (Blueprint $table) {
            //inst one to many -- done 
            $table->increments('id');
            $table->string('nameInEnglish');
            $table->string('nameInArabic');
            $table->string('jobTitle');
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
        Schema::drop('inst_directors');
    }
}
