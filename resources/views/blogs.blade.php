@extends('layout')

@section('content')
    <div class="header">
        <a href="{{ route('login.show') }}">Авторизироваться</a>
        @if($authorized == 'true')
            <a href="{{ route('profile.show') }}">Вернуться в профиль</a>
        @endif
        <a href="{{ route('register.show') }}">Зарегистрироваться</a>
    </div>
    <div class="container">
    @foreach($models as $model)
        <div class="block">
        <p class="content">{{ $model['content'] }}</p>
            <p class="author">Автор: {{ $model['author'] }}</p>
        </div>
    @endforeach
    </div>

    <style>
        .header {
            margin-bottom: 30px;
            margin-top: 10px;
        }

        .author {
            text-align: right;
            margin-right: 10px;
            font-weight: bold;
        }

        .block {
            border: 2px solid black;
            border-radius: 10px;
            margin-top: 10px;
            padding: 5px;
        }
        a {
            text-decoration: none;
            color: black;
            margin-left: 10%;
            margin-right: 10%;
            font-weight: bold;

            transition: 0.5s;
        }

        a:hover {
            color: #BA68C8;
        }
    </style>
@endsection
