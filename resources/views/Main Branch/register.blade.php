@extends('Main Branch.layout')

@section('content')
    <div class="outer">
        <div class="reg_inner">
            <form method="post" action="{{ route('register.action') }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <p class="title">Регистрация</p>

                <div class="form-group form-floating mb-3">
                    <input type="name" class="form-control" name="name" placeholder="Имя" required="required"
                           autofocus>
                    <label for="floatingName">Имя</label>
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Электорнная почта"
                           required="required" autofocus>
                    <label for="floatingEmail">Электронная почта</label>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Пароль"
                           required="required">
                    <label for="floatingPassword">Пароль</label>
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="password_confirmation"
                           placeholder="Подтверждение пароля" required="required">
                    <label for="floatingConfirmPassword">Подтверждение пароля</label>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>

                <button class="auth_btn" type="submit">Зарегистрироваться</button>

            </form>
            <form action="{{route('login.show')}}">
                <button class="auth_btn" type="submit" style="margin-top: 10px">Авторизоваться</button>
            </form>
        </div>
    </div>
@endsection
