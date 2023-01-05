<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    public function show() {
        return view('login');
    }

    public function login(LoginRequest $request) {
        $data = $request->all();

        $email = $data['email'];
        $password = $data['password'];

        $user = User::where('email', '=', $email)->first();

        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $password_bd = $user['password'];

            if ($password_bd == $password) {
                session()->put('id', $user['id']);
                session()->put('permissions', $user['permissions']);
                return redirect()->to('/profile');
            }
        }

    }
}
