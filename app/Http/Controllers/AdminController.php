<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateUserRequest;
use App\Services\UserService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()    {
        $loggedInUser = Auth::user();
        $status = $loggedInUser->status;
        $users = User::all();
        $year = Carbon::now()->format('Y');
        return view('private',
            [
                'status' => $status,
                'users' => $users,
                'loggedInUser' => $loggedInUser,
                'year' => $year
            ]);
    }

    public function create_user()
    {
        $user = Auth::user();
        $status = $user->status;

        if($status == 'admin') {
            return view('create_user', ['user' => $user]);
        } else {
            return redirect()->route('private');
        }
    }

    public function create_user_form(CreateUserRequest $request)
    {
       $oldUser = $this->userService->checkUserEmail($request);

        if($oldUser) {
            return redirect('create_user')->with('hasEmail', 'This email is already taken');
        }

        $this->userService->createUser($request);
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

        if($this->userService->userCanEditProfile($loggedInUser, $user)) {
            return view('edit', ['user' => $user]);
        }
        return redirect('private');
    }

    public function edit_form(Request $request, UserService $userService, $id)
    {
        $userService->editRecord($request, $id);
        return redirect('private')->with('updatedUser', 'User has been updated');
    }

    public function security($id)
    {
        $loggedInUser = Auth::user();

        $user = User::find($id);

        if($this->userService->userCanEditProfile($loggedInUser, $user)) {
            return view('security', ['user' => $user]);
        } else {
            return redirect('private');
        }

    }

    public function security_form(Request $request, $id)
    {
        if($request->password != $request->password_confirm) {
            return redirect()->to('security/'.$id)->with('passwordError', 'Password mismatch');
        } else {
            $this->userService->editSecurity($id, $request);
            return redirect('private')->with('updatedUser', 'User has been updated');
        }

    }

    public function status($id)
    {
        $loggedInUser = Auth::user();

        $user = User::find($id);

        if($this->userService->userCanEditProfile($loggedInUser, $user)) {
            return view('status', ['user' => $user]);
        } else {
            return redirect('private');
        }
    }

    public function status_form(Request $request, $id)
    {
        $this->userService->editState($id, $request);

        return redirect('private')->with('updatedUser', 'User has been updated');
    }

    public function avatar($id)
    {
        $loggedInUser = Auth::user();
        $user = User::find($id);

        if($this->userService->userCanEditProfile($loggedInUser, $user)) {
            return view('avatar', ['user' => $user]);
        } else {
            return redirect('private');
        }
    }

    public function avatar_form(Request $request, $id)
    {
        $this->userService->editAvatar($id, $request);
        return redirect('private')->with('updatedUser', 'User has been updated');
    }

    public function socials($id)
    {
        $loggedInUser = Auth::user();
        $user = User::find($id);

        if($this->userService->userCanEditProfile($loggedInUser, $user)) {
            return view('socials', ['user' => $user]);
        } else {
            return redirect('private');
        }
    }

    public function social_form(Request $request, $id)
    {
        $this->userService->editSocial($id, $request);
        return redirect('private')->with('updatedUser', 'User has been updated');
    }

    public function delete($id)
    {
        $this->userService->deleteUser($id);
        return redirect('private')->with('deleteUser', 'User has been deleted');
    }


    public function search(Request $request)
    {
        $users = User::all()->where('name', $request->name);
        $loggedInUser = Auth::user();
        $status = $loggedInUser->status;
        $year = Carbon::now()->format('Y');
        return view('private',
            [
                'status' => $status,
                'users' => $users,
                'loggedInUser' => $loggedInUser,
                'year' => $year
            ]);
    }

}
