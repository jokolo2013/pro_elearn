<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson_video extends Model
{
    //
    protected $table = 'lesson_video';
    protected $fillable = ['id', 'lessons_id', 'id_course ', 'lesson_video_name', 'lesson_video_path', 'created_at', 'updated_at'];

    public function Lessons()
    {
        return $this->belongsTo(Lessons::class, 'lessons_id');
    }
    public function Courses()
    {
        return $this->belongsTo(Courses::class, 'id_course');
    }
}
