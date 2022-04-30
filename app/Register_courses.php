<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register_courses extends Model
{
    protected $table = 'register_courses';
    protected $fillable = ['id', 'id_course', 'id_users', 'pretest_score', 'posttest_score', 'pretest_count', 'posttest_count', 'created_at', 'updated_at'];

}
