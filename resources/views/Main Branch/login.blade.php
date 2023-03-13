@extends('Main Branch.layout')

@section('content')
    <div class="outer">
        <div class="auth_inner">
            <form method="post" action="{{ route('login.action') }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <p class="title">Авторизация</p>

                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="email" value="" placeholder="Username"
                           required="required" autofocus>
                    <label for="floatingName">Email or Username</label>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="password" value="" placeholder="Password"
                           required="required">
                    <label for="floatingPassword">Password</label>
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="buttons">
                    <button class="auth_btn" type="submit">Авторизоваться</button>
                </div>

            </form>

            <form action="{{route('register.show')}}" class="register_button">
                <button class="auth_btn" type="submit">Зарегистрироваться</button>
            </form>

        </div>
    </div>
@endsection
