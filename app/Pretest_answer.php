<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pretest_answer extends Model
{
    protected $table = 'pretest_answer';
    protected $fillable = ['id', 'question_id', 'pretest_answer', 'pretest_score'];
}
