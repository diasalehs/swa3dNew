<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nameInEnglish');
            $table->string('nameInArabic');
            $table->string('livingPlace');
            $table->string('cityName');
            $table->string('country');
            $table->string('gender');
            $table->string('currentWork'); 
            $table->string('educationalLevel');
            $table->date('dateOfBirth');
            $table->string('email')->unique();
            $table->unsignedInteger('mobileNumber')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('picture')->default('default.png');
            $table->boolean('preVoluntary');
            $table->integer('voluntaryYears');
            //$table->index('skills');
            //$table->index('intrests');
            //$table->index('qualifications'); Optional
            $table->date('availableFrom')->nullable();
            $table->date('availableTo')->nullable();
            //articles table
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
        Schema::drop('researchers');
    }
}
