<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'role';
    protected $fillable = ['id','status_name'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function AdminsUsers(){
        return $this->hasMany(AdminsUsers::class);
    }
}
