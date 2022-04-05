<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson_files extends Model
{
    //
    protected $table = 'lesson_files';
    protected $fillable = ['id', 'lessons_id', 'id_course ', 'lesson_files_name', 'lesson_files_path', 'created_at', 'updated_at'];

    public function Lessons()
    {
        return $this->belongsTo(Lessons::class, 'lessons_id');
    }
    public function Courses()
    {
        return $this->belongsTo(Courses::class, 'id_course');
    }
}
