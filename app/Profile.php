<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    protected $fillable=['user_id', 'avatar', 'facebook', 'youtube', 'about'];
    public function setPasswordAttribute($password){
        $this->attributes['password']=bcrypt($password);
    }
}
