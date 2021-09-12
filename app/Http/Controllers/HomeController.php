<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function login_form() {
        return view('login');
    }

    public function registration_form()
    {
        return view('registration');
    }

    public function registration(RegisterUserRequest $request, UserService $userService)
    {
        if($userService->checkUserEmail($request)) {
            return redirect('registration')->with('hasEmail', 'This email is already taken.');
        }

        $userService->registerUser($request);
        return redirect()->route('login')->with('userAdded', 'Registration successful.');

    }


    public function authenticate(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ], ($request->get('remember_me')=='on' ? true : false))) {
            return redirect()->intended('private');
        }

        return redirect('login')->with('loginError', 'E-mail or password do not match.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}


