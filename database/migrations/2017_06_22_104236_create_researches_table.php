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
            $table->string('abstract');
            $table->string('recommendations');
            $table->string('creation_date');
            $table->string('findings');
            $table->string('tools');
            // o Check box that ensure the credibility of the researcher and the research is accurate
            $table->boolean('confirmed');   
            $table->integer('ind_id')->unsigned();
            $table->foreign('ind_id')->references('id')->on('individuals')->onDelete('cascade');
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
