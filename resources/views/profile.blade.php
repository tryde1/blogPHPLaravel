@extends('layout')

@section('content')
    <div class="outer">
        <div class="profile_block">
                <p class="title">Профиль</p>
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

                <button type="submit" class="profile_buttons">Принять</button>


            </form>
            <div class="buttons_row">
                <form action="{{ route('blog.create') }}">
                    <button type="submit"  class="profile_buttons">Создать статью</button>
                </form>

                <form action="{{route('blogs.show')}}">
                    <button type="submit" class="profile_buttons">Показать статьи</button>
                </form>

                <form action="{{route('logout')}}">
                    <button type="submit" class="profile_buttons">Выйти с профиля</button>
                </form>
            </div>
        </div>
    </div>

    <style>

        .title {
            font-size: 24px;
            font-weight: bold;
            margin: 0 auto;
            margin-bottom: 10px;
            color: white;
        }

        .outer {
            padding-top: 5%;
        }

        .profile_block {
            width: 50%;
            margin: 0 auto;
            border: 1px solid black;
            border-radius: 20px;
            padding: 20px;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
            background: rgba(0, 0, 0, 0.5);
        }

        .profile_buttons {
            width: 25%;
            margin: 0 auto 10px;
            border-radius: 10px;
            border: 1px solid white;
            transition: 0.5s;
            font-size: 14px;
        }

        .profile_buttons:hover {
            background-color: gray;
            border: 1px solid black;
        }

        .buttons_row {
            width: 100%;
        }

        .buttons_row form {
            display: inline-block;
            width: 30%;
        }

        .buttons_row form .profile_buttons {
            width: 85%;
        }
    </style>
@endsection
