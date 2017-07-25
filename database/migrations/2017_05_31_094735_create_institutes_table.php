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
            $table->integer('license')->unique();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('nameInEnglish');
            $table->string('firstInEnglish')->nullable();
            $table->string('lastInEnglish')->nullable();

            $table->string('nameInArabic');
            $table->string('firstInArabic')->nullable();
            $table->string('lastInArabic')->nullable();

            $table->float('acc_avg')->unsigned()->default(0);
            $table->float('rated')->unsigned()->default(0);
            $table->float('cat1')->unsigned()->default(0);
            $table->float('cat2')->unsigned()->default(0);
            $table->float('cat3')->unsigned()->default(0);
            $table->float('cat4')->unsigned()->default(0);
            $table->string('livingPlace');
            $table->string('cityName');
            $table->string('country');
            $table->string('email')->unique();
            $table->bigInteger('mobileNumber');
            $table->string('address');
            $table->date('establishmentYear');
            $table->integer('verified')->default(0);
            $table->string('picture')->default('default.png');
            $table->string('website')->nullable();
            $table->string('PObox')->nullable();
            $table->bigInteger('fax')->nullable();
            $table->string('bankAccount')->nullable();
            $table->string('facebookPage')->nullable();
            $table->unsignedInteger('numOfEmployees')->nullable();
            $table->unsignedInteger('numOfStakeholders')->nullable();
            $table->double('employmentRate')->nullable();
            $table->double('revenueStream')->nullable();
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
