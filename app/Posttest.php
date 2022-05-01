<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posttest extends Model
{
    protected $table = 'posttest';
    protected $fillable = ['id', 'courses_id', 'pretest_question', 'created_at', 'updated_at'];
}
