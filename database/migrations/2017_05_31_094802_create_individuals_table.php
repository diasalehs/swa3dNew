<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individuals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameInEnglish');
            $table->string('nameInArabic');
            $table->unsignedSmallInteger('livingPlace');
            $table->string('cityName');
            $table->string('country');
            $table->boolean('gender');
            $table->string('currentWork');
            $table->unsignedSmallInteger('educationalLevel');
            $table->date('dateOfBirth');
            $table->string('email')->unique();
            $table->unsignedInteger('mobileNumber')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('picture')->nullable();
            $table->boolean('preVoluntary');
            $table->integer('voluntaryYears');
            //$table->index('skills');
            //$table->index('intrests');
            //$table->index('qualifications'); Optional
            $table->date('availableFrom')->nullable();
            $table->date('availableTo')->nullable();
            $table->rememberToken();
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
        Schema::drop('individuals');
    }
}
