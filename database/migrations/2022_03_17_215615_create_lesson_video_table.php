<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_video', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lessons_id');
            $table->foreign('lessons_id')->references('id')->on('lessons');

            $table->string('lesson_video_name');
            $table->string('lesson_video_path');
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
        Schema::dropIfExists('lesson_video');
    }
}
