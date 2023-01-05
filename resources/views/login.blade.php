@extends('layout')

@section('content')
    <div class="outer">
        <div class="login_block">
            <form method="post" action="{{ route('login.action') }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <p class="title">Авторизация</p>

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
                    <button class="login_form_buttons" type="submit">Авторизоваться</button>
                </div>

            </form>

            <form action="{{route('register.show')}}" class="register_button">
                <button class="login_form_buttons" type="submit">Зарегистрироваться</button>
            </form>

        </div>
    </div>

    <style>
        button {
            width: 30%;
            margin: 0 auto 10px;
            border-radius: 10px;
            border: 1px solid white;
            transition: 0.5s;
            font-size: 14px;
        }

        .login_block {
            width: 40%;
            margin: 0 auto;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
            border: 1px solid black;
            border-radius: 20px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
        }

        p {
            font-weight: bold;
            font-size: 24px;
        }
        .outer {
            padding-top: 12%;
        }

        body {
            background: linear-gradient(to right, #333 10%, #093a57 30%, #093a57 70%, #333 90%);
        }

        .title {
            color: white;
        }

        button:hover {
            background-color: gray;
            border: 1px solid black;
        }

    </style>
@endsection
