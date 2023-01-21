@extends('layout')

@section('content')
    <div class="blogs_block">
        <div class="header">
                <a href="{{ route('profile.show') }}">Вернуться в профиль</a>
        </div>
        <div class="container">
        @foreach($models as $model)
                <form action="{{ route('blog.delete') }}" class="block" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <p class="content">{{ $model['content'] }}</p>
                    <div class="lower_block">
                        @if ($permissions == 'moderator' || $permissions == 'admin')
                                <button class="btn" type="submit"><i class="fa fa-trash"></i></button>
                                <input type="hidden" value="{{ $model['id'] }}" name="id">
                        @endif
                        <p class="author">Автор: @php
                            $article = $model;
                            $email = $article->user->email;
                            echo $email;
                                @endphp</p>
                    </div>
                </form>
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
            width: 90%;
            margin-right: 10px;
            font-weight: bold;
            text-align: right;
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

        .lower_block {
            width: 100%;
        }

        .lower_block button, .lower_block p {
            display: inline-block;
        }

        .btn {
            margin-right: 60px;
        }
    </style>
@endsection
