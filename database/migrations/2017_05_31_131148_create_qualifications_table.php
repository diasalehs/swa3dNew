<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            //ind & res many to one
            $table->increments('id');
            $table->integer('role')->nullable();
            $table->integer('targetedSegment')->nullable();
            $table->string('achievements')->nullable(); //50 word
            $table->date('achievementFrom')->nullable();
            $table->date('achievementTo')->nullable();
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
        Schema::drop('qualifications');
    }
}
