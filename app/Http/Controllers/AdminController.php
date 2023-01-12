<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminShow() {
        $data = session()->all();

        $url = explode('/', $data['_previous']['url']);

        if ($url[3] == "profile" && $data['permissions'] == 'admin') {
            $users = User::all();

            return view('admin_users')->with('users', $users);
        }
    }

    public function adminChangeAccept(AdminRequest $request) {
        $data = $request->all();

        $user = User::where('id', '=', $data['id'])->first();

        $user->permissions = $data['permissions'];
        $user->save();

        $users = User::all();

        return view('admin_users')->with('users', $users);
    }
}
