@extends('layout')

@section('content')
    <div class="outer">
        <div class="register_block">
            <form method="post" action="{{ route('register.action') }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <p class="title">Регистрация</p>

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

                <button class="register_buttons" type="submit">Зарегистрироваться</button>

            </form>
            <form action="{{route('login.show')}}" class="register_button">
                <button class="register_buttons" type="submit">Авторизоваться</button>
            </form>
        </div>
    </div>
    <style>
        .outer {
            padding-top: 8%;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }

        .register_block {
            width: 50%;
            margin: 0 auto;
            border: 1px solid black;
            border-radius: 20px;
            padding: 20px;
        }

        .title {
            font-weight: bold;
            font-size: 24px;
            color: white;
        }

        .register_buttons {
            border-radius: 10px;
            transition: 0.5s;
            border: 1px solid white;
            margin-bottom: 10px;
        }

        .register_buttons:hover {
            background-color: gray;
            border: 1px solid black;
        }
    </style>
@endsection
