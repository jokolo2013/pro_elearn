<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posttest_answer extends Model
{
    protected $table = 'posttest_answer';
    protected $fillable = ['id', 'question_id', 'posttest_answer', 'posttest_score', 'created_at', 'updated_at'];
}
