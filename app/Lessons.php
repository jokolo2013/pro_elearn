<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    protected $table = 'lessons';
    protected $fillable = ['id', 'id_course', 'lesson_name', 'lesson_sort', 'created_at', 'updated_at'];

    public function Lesson_files()
    {
        return $this->hasMany(Lesson_files::class); //กําหนด FK ด้วย
    }
    public function Lesson_video()
    {
        return $this->hasMany(Lesson_video::class); //กําหนด FK ด้วย
    }

    public function Courses(){
        return $this->hasMany(Courses::class,'id_course');
    }
}
