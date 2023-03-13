<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\SearchRequest;
use App\Jobs\UsersSearch;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminShow() {
        $data = session()->all();

        $url = explode('/', $data['_previous']['url']);

        if ($url[3] == "profile" && $data['permissions'] == 'admin') {
            $users = User::all();

            return view('Administrator Panel/admin_users')->with('users', $users);
        }
        else {
            return redirect()->to('/profile');
        }
    }

    public function showActivity() {
        $data = session()->all();

        $url = explode('/', $data['_previous']['url']);

        if ($url[3] == "profile" && $data['permissions'] == 'admin') {
            $users = User::orderBy('updated_at', 'desc')->get();
            $articles = Article::orderBy('updated_at', 'desc')->get();

            return view('Administrator Panel/admin_activity')->with('users', $users)->with('articles', $articles);
        }
        else {
            return redirect()->to('/profile');
        }
    }

    public function Action(AdminRequest $request) {
        if ($request['action'] == 'usersSearch') {
            $data = $request->all();

            $users = User::where('id', '=', $data['value'])->orWhere('email', '=', $data['value'])->get();

            return view('Administrator Panel/admin_users')->with('users', $users);
        } else if ($request['action'] == 'acceptChange') {
            $data = $request->all();

            $user = User::where('id', '=', $data['id'])->first();

            $user->permissions = $data['permissions'];
            $user->save();

            $users = User::all();

            return view('Administrator Panel/admin_users')->with('users', $users);
        }
    }
}
