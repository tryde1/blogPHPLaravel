@extends('layout')

@section('content')
    <form method="post" action="{{ route('register.action') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="h3 mb-3 fw-normal">Регистрация</h1>

        <div class="form-group form-floating mb-3">
            <input type="name" class="form-control" name="name" placeholder="name" required="required" autofocus>
            <label for="floatingName">Name</label>
        </div>

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button class="btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>

    </form>
    <form action="{{route('login.show')}}" class="register_button">
        <button class="btn btn-lg btn-primary" type="submit">Авторизоваться</button>
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
