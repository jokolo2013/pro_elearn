<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate_template extends Model
{
    protected $table = 'certificate_template';
    protected $fillable = ['id', 'user_id', 'certificate_image_background', 'publish', 'created_at', 'updated_at'];
}
