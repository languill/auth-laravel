<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()    {

        $user = Auth::user();

        $status = User::userStatus();

        $users = User::all();

        $year = Carbon::now()->format('Y');

        return view('private', ['status' => $status, 'users' => $users, 'loggedInUser' => $user, 'year' => $year]);
    }

    public function create_user()
    {
        $user = Auth::user();

        $status = User::userStatus();

        if($status == 'admin') {
            return view('create_user', ['user' => $user]);
        } else {
            return redirect()->route('private');
        }
    }

    public function create_user_form(Request $request)
    {
       $oldUser = User::where('email', '=', Input::get('email'))->exists();

        if($oldUser) {
            return redirect('create_user')->with('hasEmail', 'This email is already taken');
        }

        User::createUser($request);

        return redirect('private')->with('newUser', 'User has been created');
    }

    public function one_user($id)
    {
        $user = User::find($id);

        return view('one_user', ['user' => $user]);
    }

    public function edit($id)
    {
        $loggedInUser = Auth::user();

        $user = User::find($id);

        if(($loggedInUser->id == $user->id) || ($loggedInUser->status) == 'admin') {
            return view('edit', ['user' => $user]);
        } else {
            return redirect('private');
        }

    }

    public function edit_form(Request $request, $id)
    {
        User::editUser($id, $request);

        return redirect('private')->with('updatedUser', 'User has been updated');
    }

    public function security($id)
    {
        $loggedInUser = Auth::user();

        $user = User::find($id);

        if(($loggedInUser->id == $user->id) || ($loggedInUser->status) == 'admin') {
            return view('security', ['user' => $user]);
        } else {
            return redirect('private');
        }

    }

    public function security_form(Request $request, $id)
    {
        if($request->password != $request->password_confirm) {
            return redirect()->back()->with('passwordError', 'Password mismatch');
        } else {
            User::editSecurity($id, $request);
            return redirect('private')->with('updatedUser', 'User has been updated');
        }

    }

    public function status($id)
    {
        $loggedInUser = Auth::user();

        $user = User::find($id);

        if(($loggedInUser->id == $user->id) || ($loggedInUser->status) == 'admin') {
            return view('status', ['user' => $user]);
        } else {
            return redirect('private');
        }
    }

    public function status_form(Request $request, $id)
    {
        User::editStatus($id, $request);

        return redirect('private')->with('updatedUser', 'User has been updated');
    }

    public function avatar($id)
    {
        $loggedInUser = Auth::user();

        $user = User::find($id);

        if(($loggedInUser->id == $user->id) || ($loggedInUser->status) == 'admin') {
            return view('avatar', ['user' => $user]);
        } else {
            return redirect('private');
        }
    }

    public function avatar_form(Request $request, $id)
    {
        User::editAvatar($id, $request);

        return redirect('private')->with('updatedUser', 'User has been updated');
    }

    public function delete($id)
    {
        User::deleteUser($id);
        return redirect('private')->with('deleteUser', 'User has been deleted');
    }
}
