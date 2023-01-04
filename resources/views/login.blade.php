@extends('layout')

@section('content')
    <form method="post" action="{{ route('login.action') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="email" value="" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email or Username</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="buttons">
            <button class="btn btn-lg btn-primary" type="submit">Авторизоваться</button>
        </div>

    </form>

    <form action="{{route('register.show')}}" class="register_button">
        <button class="btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>
    </form>

    <form action="{{route('blogs.show')}}" class="blogs_button">
        <button class="btn btn-lg btn-primary" type="submit">Показать статьи</button>
    </form>
    <style>
        form {
            width: 50%;
            margin: 0 auto;
        }
        button {
            width: 30%;
            margin: 0 auto 10px;
        }

    </style>
@endsection
