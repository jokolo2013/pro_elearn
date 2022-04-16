<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Register_courses extends Model
{
    protected $table = 'register_courses';
    protected $fillable = ['id', 'id_course', 'id_users', 'created_at', 'updated_at'];

}
