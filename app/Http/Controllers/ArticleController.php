<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\BlogRequest;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showblog() {
        $models = Article::all();

        $data = session()->all();

        if (count($data) == 5) {
            return view('blogs')->with('models', $models)->with('authorized', 'true')->with('permissions', $data['permissions']);
        }else {return redirect()->to('/login');}
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

            $content = $data['content'];

            if (strlen($content) > 20000) {
                return redirect()->to('/profile/blog')->withErrors(['error' => 'Длина статьи слишком большая']);
            }elseif ($content == null) {
                return redirect()->to('/profile/blog');
            }
            else {
                $article = new Article();
                $article->content = $content;
                $article->user_id = $id;
                $article->hidden = false;

                $user->articles()->save($article);

                return redirect()->to('/profile');
            }
    }

    public function delete(BlogRequest $request) {
        $data = $request->all();

        Article::where('id', '=', $data['id'])->delete();
        $models = Article::all();
        $permissions = session()->all()['permissions'];

        return view('blogs')->with('models', $models)->with('authorized', 'true')->with('permissions', $permissions);
    }
}
