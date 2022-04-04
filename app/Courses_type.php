<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses_type extends Model
{
    protected $table = 'courses_type';
    protected $fillable = ['id','courses_type_name'];

    public function Courses() {
        return $this->hasMany(Courses::class);
        }
}
