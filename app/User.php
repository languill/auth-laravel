<?php

namespace App;


use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticable;



class User extends Authenticable {

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public $guarded = [];

    public function record()
    {
        return $this->hasOne(Record::class)->withDefault();
    }

    public function state()
    {
        return $this->hasOne(State::class)->withDefault();
    }

    public function avatar()
    {
        return $this->hasOne(Avatar::class)->withDefault();
    }

    public function social()
    {
        return $this->hasOne(Social::class)->withDefault();
    }

}
