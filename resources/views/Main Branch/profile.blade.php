@extends('Main Branch.layout')

@section('content')
    <div class="outer">
        <div class="profile_inner">
            <div class="avatar">
                <img src="{{ URL::asset('avatars/' . $id . '.jpg') }}" class="profile_avatar">
            </div>

            <form method="post" action="{{ route('profile.action') }}" class="profile_form" enctype="multipart/form-data">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <div class="form-group form-floating mb-3">
                    <input type="email" class="form-control" name="email" autofocus value="{{ $email }}" readonly>
                    <label for="floatingName" class="label">Электронная почта</label>
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="name" class="form-control" name="name" placeholder="Name" autofocus
                           value="{{ $name }}">
                    <label for="floatingName" class="label">Имя</label>
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="name" class="form-control" name="surname" placeholder="Фамилия" autofocus
                           value="{{ $surname }}">
                    <label for="floatingEmail" class="label">Фамилия</label>
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="phonenumber" class="form-control" name="phonenumber" placeholder="Phonenumber"
                           value="{{ $phonenumber }}">
                    <label for="floatingPassword" class="label">Номер телефона</label>
                    @if ($errors->has('error'))
                        <span class="text-danger text-center">{{ $errors->first('error') }}</span>
                    @endif
                </div>

                <div class="add_photo">
                    <label>Добавить фотографию</label>
                    <input type="file" name="avatar" class="file_input" id="photo">
                </div>

                <button type="submit" class="profile_accept">Принять</button>
                <a href="{{ route('logout') }}" class="logout">Выйти</a>
            </form>
        </div>
    </div>


@endsection
