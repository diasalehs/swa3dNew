<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('license')->unique();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nameInEnglish');
            $table->string('nameInArabic');
            $table->string('livingPlace');
            $table->string('cityName');
            $table->string('country');
            $table->unsignedInteger('workSummary'); //300 word
            //$table->string('feildNGO'); // separate table
            $table->string('activities'); // or string
            $table->string('email')->unique();
            $table->unsignedInteger('mobileNumber')->unique();
            $table->string('address');
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->string('PObox')->nullable();
            $table->unsignedInteger('fax')->nullable();
            $table->string('bankAccount')->nullable();
            $table->string('facebookPage')->nullable();
            $table->unsignedInteger('numOfEmployees')->nullable();
            $table->unsignedInteger('numOfStakeholders')->nullable();
            $table->double('employmentRate')->nullable();
            $table->double('revenueStream')->nullable();
            $table->date('establishmentYear')->nullable();
            //main achievements and awards and date
            //Names of Board of directors and their job title
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
        Schema::drop('institutes');
    }
}
