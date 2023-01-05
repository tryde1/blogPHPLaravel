@extends('layout')

@section('content')
    <div class="outer">
        <div class="blogs_form_block">
            <label class="title">Создание записи</label>

            <form method="post" action="{{ route('blog.create') }}" class="form_blog">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <p>Введите текст статьи в форму ниже (максимальное количество символов - 2000)</p>
                <p><textarea name="content"></textarea></p>

                @if($errors->has('error'))
                    <p class="error">{{$errors->first('error')}}</p>
                @endif

                <button type="submit" class="blog_form_buttons">Отправить</button>
            </form>

            <form action="{{ route('profile.show') }}">
                <button class="blog_form_buttons">Вернуться в профиль</button>
            </form>
        </div>
    </div>

    <style>
        .outer {
            padding-top: 8%;
        }

        .blogs_form_block {
            margin: 0 auto;
            text-align: center;
            border: 1px solid black;
            border-radius: 20px;
            width: 70%;
            font-family: 'Montserrat', sans-serif;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .title {
            font-weight: bold;
            color: white;
        }

        p {
            color: white;
            font-size: 12px;
        }

        .blog_form_buttons {
            margin-bottom: 10px;
            border: 1px solid white;
            border-radius: 10px;
            transition: 0.5s;
        }

        .blog_form_buttons:hover {
            background-color: gray;
            border: 1px solid black;
        }

        textarea {
            width: 100%;
            border-radius: 10px;
            height: 300px;
        }
    </style>
@endsection
