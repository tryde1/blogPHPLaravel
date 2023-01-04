@extends('layout')

@section('content')
    <div class="header">
        <label class="title">Создание записи</label>
    </div>
    <form method="post" action="{{ route('blog.create') }}" class="form_blog">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <p>Введите текст статьи в форму ниже (максимальное количество символов - 2000)</p>
        <p><textarea name="content"></textarea></p>

        @if($errors->has('error'))
            <p class="error">{{$errors->first('error')}}</p>
        @endif

        <button type="submit">Отправить</button>
    </form>

    <form action="{{ route('profile.show') }}">
        <button>Вернуться в профиль</button>
    </form>

    <style>
        form {
            width: 100%;
            margin: 0 auto;
        }

        textarea {
            width: 70%;
            height: 200px;
            margin: 0 auto;
        }

        .title {
            font-weight: bold;
            font-size: 24px;
        }

        a:hover {
            color: #BA68C8;
        }

        button {
            background-color: #636b6f;
            margin-bottom: 10px;
            border-color: rebeccapurple;
            border-radius: 10px;
            color: white;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
@endsection
