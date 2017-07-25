<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempInstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('temp_institutes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('license')->unique();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('nameInEnglish');
            $table->string('firstInEnglish')->nullable();
            $table->string('lastInEnglish')->nullable();

            $table->string('nameInArabic');
            $table->string('firstInArabic')->nullable();
            $table->string('lastInArabic')->nullable();

            $table->string('livingPlace');
            $table->string('cityName');
            $table->string('country');
            $table->string('email')->unique();
            $table->unsignedInteger('mobileNumber');
            $table->string('address');
            $table->date('establishmentYear');
            $table->integer('verified')->default(0);
            $table->string('picture')->default('default.png');
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
        Schema::dropIfExists('temp_institutes');
    }
}
;