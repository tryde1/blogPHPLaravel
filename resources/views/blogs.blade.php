@extends('layout')

@section('content')
    <div class="blogs_block">
        <div class="header">
                <a href="{{ route('profile.show') }}">Вернуться в профиль</a>
        </div>
        <div class="container">
        @foreach($models as $model)
            <div class="block">
            <p class="content">{{ $model['content'] }}</p>
                <p class="author">Автор: {{ $model['author'] }}</p>
            </div>
        @endforeach
        </div>
    </div>

    <style>
        .blogs_block {
            font-family: 'Montserrat', sans-serif;
        }

        .header {
            margin-bottom: 30px;
            margin-top: 10px;
            text-align: center;
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
            padding: 10px;
            color: gray;
            font-size: 14px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
        }
        a {
            text-decoration: none;
            color: black;
            margin-left: 10%;
            margin-right: 10%;
            font-weight: bold;
            border: 1px solid white;
            background-color: white;
            transition: 0.5s;
            border-radius: 10px;
            font-size: 14px;
            padding: 4px;
        }

        a:hover {
            background-color: gray;
            border: 1px solid black;
        }
    </style>
@endsection
