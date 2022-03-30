<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');

            $table->unsignedBigInteger('course_type_id');
            $table->foreign('course_type_id')->references('id')->on('courses_type');

            $table->string('course_name');
            $table->string('course_images');
            $table->string('course_videos');
            $table->string('course_detail');
            $table->string('course_difficulty');
            $table->integer('course_times');
            $table->string('course_will_learn');
            $table->string('course_objective');
            $table->integer('viewer');
            $table->integer('publish');
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
        Schema::dropIfExists('courses');
    }
}
