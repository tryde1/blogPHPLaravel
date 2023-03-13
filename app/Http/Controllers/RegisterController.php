<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Notifications\SendNotification;
use App\User;
use http\Exception\UnexpectedValueException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Telegram\TelegramMessage;
use Telegram\Bot\Laravel\Facades\Telegram;

class RegisterController extends Controller
{
    public function show() {
        return view('Main Branch/register');
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
        $user->permissions = 'user';
        $user->image = '';

        $user->save();

        return redirect()->to('/login');
    }
}
