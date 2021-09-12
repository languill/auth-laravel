<?php


namespace App\Services;


use App\Avatar;
use App\Record;
use App\Social;
use App\State;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserService
{

    public function registerUser($data)
    {
        $validateFields = $this->validateData($data);
        User::create($validateFields);
    }

    public function checkUserEmail($data)
    {
        $validateFields = $this->validateData($data);
        $userExists  = User::where('email', '=', $validateFields['email'])->exists();
        return $userExists;
    }

    public function validateData($data) {
        return $data->validated();
    }

    public function userCanEditProfile($loggedInUser, $user)
    {
        if(($loggedInUser->id == $user->id) || ($loggedInUser->status) == 'admin')
        {
            return true;
        }
    }

    public function editRecord($data, $id)
    {
        $record = Record::where('user_id', $id)->first();

        if($record == null) {
            Record::create([
                'job_title' => $data->job_title,
                'phone' => $data->phone,
                'address' => $data->address,
                'about' => $data->about,
                'user_id' => $id
            ]);

        } else {
            $record->job_title = $data->job_title;
            $record->phone = $data->phone;
            $record->address = $data->address;
            $record->about = $data->about;
            $record->save();
        }
    }

    public function editSecurity($id, $data)
    {
        $user = User::find($id);
        $user->email = $data->email;
        $user->password = $data->password;
        $user->save();
    }



    public static function editState($id, $data)
    {
        $state = State::where('user_id', $id)->first();

        if($state == null) {
            State::create([
                'state_title' => $data->state_title,
                'user_id' => $id
            ]);

        } else {
            $state->state_title = $data->state_title;
            $state->save();
        }
    }

    public function editAvatar($id, $data)
    {
        $avatar = Avatar::where('user_id', $id)->first();
        $image = $data->file('avatar_title');
        $filename = $image->store('uploads');

        if($avatar == null) {
            Avatar::create([
                'avatar_title' => $filename,
                'user_id' => $id
            ]);

        } else {
            $this->deleteAvatar($avatar);
            $avatar->avatar_title = $filename;
            $avatar->save();
        }
    }

    public function editSocial($id, $data)
    {
        $social = Social::where('user_id', $id)->first();

        if($social == null) {
            Social::create([
                'vk' => $data->vk,
                'tg' => $data->tg,
                'inst' => $data->inst,
                'fb' => $data->fb,
                'user_id' => $id
            ]);

        } else {
            $social->vk = $data->vk;
            $social->tg = $data->tg;
            $social->inst = $data->inst;
            $social->save();
        }
    }


    public function deleteUser($id)
    {
        $user = User::find($id);

        $this->deleteAvatar($user->avatar);

        $user->avatar()->delete();
        $user->record()->delete();
        $user->social()->delete();
        $user->state()->delete();

        $user->delete();
    }

    public function createUser($data)
    {
        $user = new User;
        $user->email = $data->email;
        $user->password = $data->password;
        $user->status = 'user';
        $user->name = $data->name;
        $user->gender = $data->gender;
        $user->save();

        $record = new Record;
        $record->job_title = $data->job_title;
        $record->phone  = $data->phone;
        $record->address = $data->address;
        $record->about = $data->about;
        $user->record()->save($record);

        $state = new State;
        $state->state_title = $data->state_title;
        $user->state()->save($state);

        $social = new Social;
        $social->vk = $data->vk;
        $social->tg = $data->tg;
        $social->inst = $data->inst;
        $social->fb = $data->fb;
        $user->social()->save($social);

        $avatar = $data->file('avatar');
        $filename = $this->uploadAvatar($avatar);

        $avatar = new Avatar;
        $avatar->avatar_title = $filename;
        $user->avatar()->save($avatar);
    }

    public function uploadAvatar($avatar)
    {
        return File::exists($avatar) ? $avatar->store('uploads') : null;
    }

    public function deleteAvatar($avatar)
    {
        if(File::exists($avatar->avatar_title)) {
            Storage::delete($avatar->avatar_title);
        }
    }


}
