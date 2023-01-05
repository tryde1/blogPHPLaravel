<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\BlogRequest;
use App\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showblog() {
        $models = Article::all();
        $users = User::all();

        $data = session()->all();

        if (count($data) == 4) {
            return view('blogs')->with('models', $models)->with('authorized', 'true');
        } else {
            return view('blogs')->with('models', $models)->with('authorized', 'false');
        }
    }

    public function show() {
        if (session()->has('id')) {
            return view('blog_form');
        } else {
            return redirect()->to('/login');
        }
    }

    public function create(BlogRequest $request) {
            $data = $request->all();

            $id = session()->get('id');

            $user = User::where('id', '=', $id)->first();
            $email = $user['email'];

            $content = $data['content'];

            if (strlen($content) > 20000) {
                return redirect()->to('/profile/blog')->withErrors(['error' => 'Длина статьи слишком большая']);
            }elseif ($content == null) {
                return redirect()->to('/profile/blog');
            }
            else {
                $article = new Article();

                $article->content = $content;
                $article->author = $email;

                $article->save();

                return redirect()->to('/profile');
            }
    }
}
