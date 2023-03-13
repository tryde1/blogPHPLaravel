<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\BlogRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use function GuzzleHttp\Promise\all;

class ArticleController extends Controller
{
    public function showblog() {
        $models = Article::all();

        $data = session()->all();

        if (Arr::has($data, 'id')) {
            $user = User::where('id', '=', $data['id'])->first();

            return view('Articles/blogs')->with('models', $models)->with('auth', true)->with('permissions', $user['permissions'])->with('id', $user['id']);
        }
        else {
            return view('Articles/blogs')->with('models', $models)->with('permissions', 'user')->with('auth', false);
        }
    }

    public function show() {
        if (session()->has('id')) {
            return view('Articles/blog_form');
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
                return redirect()->to('/blog/create')->withErrors(['error' => 'Длина статьи слишком большая']);
            }elseif ($content == null) {
                return redirect()->to('/blog/create');
            }
            else {
                $article = new Article();
                $article->content = $content;
                $article->user_id = $id;
                $article->hidden = false;

                $user->articles()->save($article);

                return redirect()->to('/blog');
            }
    }

    public function delete(BlogRequest $request) {
        $data = $request->all();

        Article::where('id', '=', $data['id'])->delete();
        $models = Article::all();

        $id = session()->all();
        $user = User::where('id', '=', $id['id'])->first();

        return view('Articles/blogs')->with('models', $models)->with('auth', true)->with('permissions', $user['permissions'])->with('id', $user['id']);
    }

    public function action(BlogRequest $request) {
        $action = $request->all()['action'];
        $data = $request->all();

            if ($action == 'deleteArticle') {
                Article::where('id', '=', $data['id'])->delete();
                $models = Article::all();

                $id = session()->all();
                $user = User::where('id', '=', $id['id'])->first();

                return view('Articles/blogs')->with('models', $models)->with('auth', true)->with('permissions', $user['permissions'])->with('id', $user['id']);
            }
            else if ($action == 'hideArticle') {
                $article = Article::where('id', '=', $data['id'])->first();
                $article->hidden = true;
                $article->save();

                $models = Article::all();

                $id = session()->all();
                $user = User::where('id', '=', $id['id'])->first();

                return view('Articles/blogs')->with('models', $models)->with('auth', true)->with('permissions', $user['permissions'])->with('id', $user['id']);
            }
            elseif ($action == 'showArticle') {
                $article = Article::where('id', '=', $data['id'])->first();
                $article->hidden = false;
                $article->save();

                $models = Article::all();

                $id = session()->all();
                $user = User::where('id', '=', $id['id'])->first();

                return view('Articles/blogs')->with('models', $models)->with('auth', true)->with('permissions', $user['permissions'])->with('id', $user['id']);

            }
    }
}
