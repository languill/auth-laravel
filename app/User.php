<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class User extends Authenticable
{

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public static function addUser($data)
    {
        $user = new self;
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->status = 'user';
        $user->save();
    }

    public static function userStatus()
    {
        $user = Auth::user();
        $status = $user->status;
        return $status;
    }

    public static function createUser($data)
    {
       $data->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $user = new self;
        $user->email = $data->email;
        $user->password = $data->password;
        $user->status = 'user';
        $user->user_name = $data->user_name;
        $user->job_title = $data->job_title;
        $user->phone = $data->phone;
        $user->address = $data->address;
        $user->online_status = $data->online_status;

        $image = $data->file('avatar');

        if (File::exists($image)) {
            $filename = $image->store('uploads');
        } else {
            $filename = null;
        }

        $user->avatar = $filename;

        $user->vk = $data->vk;
        $user->telegram = $data->telegram;
        $user->instagram = $data->instagram;

        $user->save();
    }

    public static function editUser($id, $data)
    {
        $user = User::find($id);
        $user->user_name = $data->user_name;
        $user->job_title = $data->job_title;
        $user->phone = $data->phone;
        $user->address = $data->address;
        $user->save();
    }

    public static function editSecurity($id, $data)
    {
        $user = self::find($id);
        $user->email = $data->email;
        $user->password = $data->password;
        $user->save();
    }

    public static function editStatus($id, $data)
    {
        $user = self::find($id);
        $user->online_status = $data->online_status;
        $user->save();
    }

    public static function editAvatar($id, $data)
    {
        $user = self::find($id);

        $currentImage = $user->avatar;

        if(File::exists($currentImage)) {
            Storage::delete($currentImage);
        }

        $image = $data->file('avatar');
        $filename = $image->store('uploads');
        $user->avatar = $filename;
        $user->save();
    }

    public static function deleteUser($id)
    {
        $user = User::find($id);

        $currentImage = $user->avatar;

        if(File::exists($currentImage)) {
            Storage::delete($currentImage);
        }

        $user->delete();
    }







}
