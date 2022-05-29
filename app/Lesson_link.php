<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson_link extends Model
{
    protected $table = 'lesson_link';
    protected $fillable = ['id', 'lessons_id', 'id_course', 'lesson_link_name', 'lesson_link_path', 'created_at', 'updated_at'];

    public function Lessons()
    {
        return $this->belongsTo(Lessons::class, 'lessons_id');
    }
    public function Courses()
    {
        return $this->belongsTo(Courses::class, 'id_course');
    }
}
