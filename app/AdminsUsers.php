<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminsUsers extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'id','id_role','Fname', 'Lname','Gender','tel','pic_profile','email', 'password',
    ];

    public function profile(){
        return $this->belongsTo(Profile::class,'id_role');
    }

    public function Courses(){
        return $this->hasMany(Courses::class,'id');
    }


}
