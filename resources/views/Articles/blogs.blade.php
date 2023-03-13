<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сайт</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/signin.css') !!}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="{{ URL::asset('css/style.css') }} " rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body {
            background: linear-gradient(to right, #333 10%, #093a57 30%, #093a57 70%, #333 90%);
        }
    </style>
</head>
<body>
<header class="header">
    <div class="logo_header">
        <a href="" class="logo_a">
            <img src="{{ URL::asset('css/header_logo.png') }} " class="logo_header_img">
        </a>
    </div>
    <div class="header_a">
        @if (!$auth)
        <a href="{{ route('login.show') }}" class="header_text">
            ВОЙТИ
        </a>
        <a href="{{ route('register.show') }}" class="header_text">
            РЕГИСТРАЦИЯ
        </a>
        @else
            <a href="{{ route('blog.show') }}" class="create_article">Создать статья</a>

        <a href="{{ route('profile.show') }}" class="header_avatar">
            <img src="{{ URL::asset('avatars/' . $id . '.jpg') }} " class="avatar_header_img">
        </a>
        @endif
    </div>
</header>
            @foreach($models as $model)
                <div class="content">
                    <div class="article">
                @if ($model['hidden'] == false && $permissions == 'user')
                <div class="article_content">
                    {{ $model['content'] }}
                </div>
                    <div class="lower_panel">
                        <div class="article_buttons">
                            @if ($permissions == 'moderator' || $permissions == 'admin')
                                <form action="{{ route('blog.action') }}" method="post">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <input type="hidden" value="{{ $model['id'] }}" name="id">
                                    <input type="hidden" value="deleteArticle" name="action">

                                    <button type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                <form action="{{ route('blog.action') }}" method="post">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <input type="hidden" value="{{ $model['id'] }}" name="id">
                                    <input type="hidden" value="hideArticle" name="action">

                                    <button class="btn" type="submit"><i class="fa fa-eye-slash" aria-hidden="true" style="color: white"></i></button>
                                </form>
                            @endif
                        </div>
                        <p class="article_author">Автор: @php
                                $article = $model;
                                $email = $article->user->email;
                                echo $email;
                            @endphp</p>
                    </div>
                @elseif ($permissions == 'admin' || $permissions == 'moderator')
                    <div class="article_content">

                        {{ $model['content'] }}

                    </div>
                        <div class="lower_panel">
                            <div class="article_buttons">
                            @if ($permissions == 'moderator' || $permissions == 'admin')
                                <form action="{{ route('blog.action') }}" method="post">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <input type="hidden" value="{{ $model['id'] }}" name="id">
                                    <input type="hidden" value="deleteArticle" name="action">

                                    <button class="btn" type="submit" ><i class="fa fa-trash" style="color: white"></i></button>
                                </form>
                            @if ($model['hidden'] == false)
                                <form action="{{ route('blog.action') }}" method="post">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <input type="hidden" value="{{ $model['id'] }}" name="id">
                                    <input type="hidden" value="hideArticle" name="action">

                                    <button class="btn" type="submit"><i class="fa fa-eye-slash" aria-hidden="true" style="color: white"></i></button>
                                </form>
                                @else
                                    <form action="{{ route('blog.action') }}" method="post">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                        <input type="hidden" value="{{ $model['id'] }}" name="id">
                                        <input type="hidden" value="showArticle" name="action">

                                        <button class="btn" type="submit"><i class="fa fa-eye" aria-hidden="true" style="color: white"></i></button>
                                    </form>
                                @endif
                            @endif
                            </div>
                            <p class="article_author">Автор: @php
                                    $article = $model;
                                    $email = $article->user->email;
                                    echo $email;
                                @endphp</p>
                        </div>
                @endif
                    </div>
                </div>
            @endforeach
<footer>
    <p>Все права защищены</p>
    <p>Создатель: Ермак-Ермашко Алексей</p>
    <p></p>
</footer>
</body>
</html>
