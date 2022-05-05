<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate_setting extends Model
{
    protected $table = 'certificate_setting';
    protected $fillable = ['id', 'courses_id', 'certificate_template_id', 'description', 'created_at', 'updated_at'];
}
