@extends('layout')

@section('content')
    <div class="header">
        <p class="title">Профиль</p>
        <a href="{{route('logout')}}" class="link">Выйти</a>
    </div>
    <form method="post" action="{{ route('profile.action') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" autofocus value="{{ $email }}" readonly>
            <label for="floatingName" class="label">Email</label>
        </div>

        <div class="form-group form-floating mb-3">
            <input type="name" class="form-control" name="name" placeholder="Name" autofocus value="{{ $name }}">
            <label for="floatingName" class="label">Name</label>
        </div>

        <div class="form-group form-floating mb-3">
            <input type="name" class="form-control" name="surname" placeholder="Surname" autofocus value="{{ $surname }}">
            <label for="floatingEmail" class="label">Surname</label>
        </div>

        <div class="form-group form-floating mb-3">
            <input type="phonenumber" class="form-control" name="phonenumber" placeholder="Phonenumber" value="{{ $phonenumber }}">
            <label for="floatingPassword" class="label">Phone Number</label>
            @if ($errors->has('error'))
                <span class="text-danger text-center">{{ $errors->first('error') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Принять</button>


    </form>

    <form action="{{ route('blog.create') }}" class="blog_button">
        <button class="w-100 btn btn-lg btn-primary" type="submit">Создать статью</button>
    </form>

    <form action="{{route('blogs.show')}}" class="blogs_button">
        <button class="w-100 btn btn-lg btn-primary" type="submit">Показать статьи</button>
    </form>

    <style>
        .header {
            width: 100%;
            display: flex;
            flex-direction: row;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin: 0 auto;
            vertical-align: center;
            margin-bottom: 10px;
        }
        .link {
            font-size: 16px;
            margin-top: 6px;
            margin-right: 10px;
            text-decoration: none;
            color: black;
            transition: 0.5s;
        }
        .link:hover {
            color: #BA68C8;
        }

        .blog_button, .blogs_button {
            margin-top: 10px;
        }

    </style>
@endsection
