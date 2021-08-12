<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\User;

class UserController extends Controller
{
    public function usernameVerify(Request $request)
    {
        $inputUsername = $request->input('signupusername');
        $user = User::where('username', '=', $inputUsername)->first();
        if ($user === null) {
            echo 0;
        }else {
            echo 1;
        }
    }
    public function emailVerify(Request $request)
    {
        $signupemail = $request->input('signupemail');
        $user = User::where('email', '=', $signupemail)->first();
        if ($user === null) {
            echo 0;
        }else {
            echo 1;
        }
    }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
         
        $user = new User;
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->password = bcrypt($password);
        echo $user->save(); 

    
    }
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            echo 1;
        }else {
            echo 0;
        }
    }
}
