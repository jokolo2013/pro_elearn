<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pretest_result extends Model
{
    protected $table = 'pretest_result';
    protected $fillable = ['id', 'user_id', 'courses_id', 'question_id', 'pretest_answer_id'];
}
