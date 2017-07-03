<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitiativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initiatives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('adminId')->unsigned();
            $table->string('nameInEnglish');
            $table->string('nameInArabic');
            $table->float('acc_avg')->unsigned()->default(0);
            $table->float('cat1')->unsigned()->default(0);
            $table->float('cat2')->unsigned()->default(0);
            $table->float('cat3')->unsigned()->default(0);
            $table->float('cat4')->unsigned()->default(0);
            $table->string('livingPlace');
            $table->string('cityName');
            $table->string('country');
            $table->string('currentWork');
            $table->date('dateOfBirth');
            $table->string('email')->unique();
            $table->unsignedInteger('mobileNumber')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('picture')->default('default.png');
            $table->boolean('preVoluntary');
            $table->integer('voluntaryYears');
            $table->date('availableFrom')->nullable();
            $table->date('availableTo')->nullable();
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
        Schema::dropIfExists('initiatives');
    }
}
