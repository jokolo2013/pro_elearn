<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificate';
    protected $fillable = ['id', 'courses_id', 'user_id', 'created_at', 'updated_at'];
}
