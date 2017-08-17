<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('institute_id')->unsigned()->default(0);
            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->boolean('approved')->unsigned()->default(0);
            $table->boolean('achievement')->unsigned()->default(0);
            $table->boolean('activity')->unsigned()->default(0);
            $table->boolean('publish')->unsigned()->default(0);
            $table->string('mainImgpath')->default('default.png');
            $table->string ('textarea',9999);
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
        Schema::dropIfExists('news');
    }
}
