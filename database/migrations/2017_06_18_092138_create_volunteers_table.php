<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->index();
            $table->integer('user_id')->index();
            $table->boolean('accepted')->default(0);

            $table->boolean('rates')->default(0);
            $table->float('acc_avgRates')->unsigned()->default(0);
            $table->float('cat1Rates')->unsigned()->default(0);
            $table->float('cat2Rates')->unsigned()->default(0);
            $table->float('cat3Rates')->unsigned()->default(0);
            $table->float('cat4Rates')->unsigned()->default(0);

            $table->boolean('rated')->default(0);
            $table->float('acc_avgRated')->unsigned()->default(0);
            $table->float('cat1Rated')->unsigned()->default(0);
            $table->float('cat2Rated')->unsigned()->default(0);
            $table->float('cat3Rated')->unsigned()->default(0);
            $table->float('cat4Rated')->unsigned()->default(0);
            
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
        Schema::dropIfExists('volunteers');
    }
}
