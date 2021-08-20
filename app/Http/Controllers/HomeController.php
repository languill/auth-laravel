<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


class HomeController extends Controller
{
    public function registration(Request $request) {
        $validateFields = $request->validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);

        $oldUser = User::where('email', '=', Input::get('email'))->exists();

        if($oldUser) {
            return redirect('registration')->with('hasEmail', 'This email is already taken');
        }

        User::addUser($validateFields);

        return redirect()->route('login')->with('userAdded', 'Registration successful');
    }


    public function authenticate(Request $request)
    {

        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ], ($request->get('remember_me')=='on' ? true : false))) {
            // Аутентификация успешна
            return redirect()->intended('private');
        }


    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}


