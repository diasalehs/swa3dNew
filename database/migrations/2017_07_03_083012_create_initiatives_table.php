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
            $table->string('firstInEnglish')->nullable();
            $table->string('lastInEnglish')->nullable();

            $table->string('nameInArabic');
            $table->string('firstInArabic')->nullable();
            $table->string('lastInArabic')->nullable();

            $table->boolean('rated')->unsigned()->default(0);
            $table->float('acc_avg')->unsigned()->default(0);
            $table->float('cat1')->unsigned()->default(0);
            $table->float('cat2')->unsigned()->default(0);
            $table->float('cat3')->unsigned()->default(0);
            $table->float('cat4')->unsigned()->default(0);
            $table->float('cat1C')->unsigned()->default(0);
            $table->float('cat2C')->unsigned()->default(0);
            $table->float('cat3C')->unsigned()->default(0);
            $table->float('cat4C')->unsigned()->default(0);
            $table->float('acc_avgC')->unsigned()->default(0);

            $table->string('cityName');
            $table->string('country');
            $table->date('dateOfBirth');
            $table->string('email')->unique();
            $table->unsignedInteger('mobileNumber')->nullable();
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
