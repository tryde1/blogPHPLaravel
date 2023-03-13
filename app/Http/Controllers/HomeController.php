<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Psy\Util\Str;

class HomeController extends Controller
{
    public function show() {

        if (session()->has('id')) {

            $id = session()->get('id');

            $values = User::where('id', '=', $id)->first();

            $email = $values['email'];
            $name = $values['name'];
            $surname = $values['surname'];
            $phonenumber = $values['phonenumber'];

            return view('Main Branch/profile')->with('email', $email)->with('name', $name)->with('surname', $surname)->with('phonenumber', $phonenumber)->with('id', $id);
        } else {
            return redirect()->to('/login');
        }
    }

    public function changeProfile(HomeRequest $request) {
        $data = $request->all();

        $phoneNumber = '';
        $name = $data['name'];
        $surname = '';
        $email = $data['email'];

        if ($data['surname'] != null) {
            $surname = $data['surname'];
        }
        if ($data['phonenumber'] != null && strlen($data['phonenumber']) == 11) {
            $phoneNumber = $data['phonenumber'];
        } else {
            return redirect()->to('/profile')->withErrors(['error' => 'Phone number - 11 symbols']);
        }

        $value = User::where('email', '=', $email)->first();

        $value->name = $name;
        $value->surname = $surname;
        $value->phonenumber = $phoneNumber;

        if ($request->hasFile('avatar')) {

            $destinationPath = public_path('avatars/');

            $fileName = $value->id . '.jpg';

            $request->file('avatar')->move($destinationPath, $fileName);

            $value->image  = $destinationPath . $fileName;
        }

        $value->save();

        return redirect()->to('/profile');

    }
}
