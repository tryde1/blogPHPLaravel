<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use http\Exception\UnexpectedValueException;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show() {
        return view('register');
    }

    public function register(RegisterRequest $request) {
        $data = $request->all();

        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        $user = new User();

        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->surname = '';
        $user->phonenumber = '';

        $user->save();

        return redirect()->to('/login');
    }
}
