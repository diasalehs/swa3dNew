<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('researcher_name');
            $table->integer('ind_id')->unsigned();
            $table->foreign('ind_id')->references('id')->on('individuals')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('abstract')->nullable();
            $table->string('recommendations')->nullable();
            $table->string('creation_date')->nullable();
            $table->string('findings')->nullable();
            $table->string('tool1')->nullable();
            $table->string('tool2')->nullable();
            $table->integer('credit')->nullable();
            $table->string('filename');
            $table->string('mime');
            $table->string('original_filename');
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
        Schema::dropIfExists('researches');
    }
}
