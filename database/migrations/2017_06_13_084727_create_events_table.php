<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('lessons')->unsigned()->default(0);
            $table->string('title');
            $table->text('description');
            $table->string('cover')->default('default.jpg');
            $table->string('country');
            $table->string('city')->default('null');
            $table->date('startDate');
            $table->date('endDate');
            $table->boolean('open')->default(1);
            $table->boolean('reviewsHidden')->default(0);
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
        Schema::dropIfExists('events');
    }
}
