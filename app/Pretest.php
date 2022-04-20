<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pretest extends Model
{
    protected $table = 'pretest';
    protected $fillable = ['id', 'courses_id', 'pretest_image_path', 'pretest_question'];
}
