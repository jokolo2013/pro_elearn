<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Courses extends Model
{
    protected $table = 'courses';
    protected $fillable = ['id', 'id_users', 'course_type_id', 'course_name', 'course_images', 'course_videos', 'course_detail', 'course_difficulty', 'course_times', 'course_will_learn', 'course_objective', 'viewer', 'publish', 'created_at', 'updated_at'];

    public function Courses_type()
    {
        return $this->belongsTo(Courses_type::class, 'course_type_id'); //กําหนด FK ด้วย
    }

    public function Lessons()
    {
        return $this->belongsTo(Lessons::class, 'id'); //กําหนด FK ด้วย
    }

    public function Lesson_files()
    {
        return $this->hasMany(Lesson_files::class); //กําหนด FK ด้วย
    }
    public function Lesson_video()
    {
        return $this->hasMany(Lesson_video::class); //กําหนด FK ด้วย
    }

    public function AdminsUsers(){
        return $this->belongsTo(AdminsUsers::class,'id_users');
    }

}
