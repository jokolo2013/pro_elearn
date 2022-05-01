<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posttest_result extends Model
{
    protected $table = 'posttest_result';
    protected $fillable = ['id', 'user_id', 'courses_id', 'question_id', 'postest_answer_id', 'created_at', 'updated_at'];
}
