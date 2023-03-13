@extends('Main Branch.layout')

@section('content')
    <div class="outer">
        <div class="auth_inner">
            <label class="title">Создание записи</label>

            <form method="post" action="{{ route('blog.create') }}" class="form_blog">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <p>Введите текст статьи в форму ниже (максимальное количество символов - 2000)</p>
                <p><textarea name="content"></textarea></p>

                @if($errors->has('error'))
                    <p class="error">{{$errors->first('error')}}</p>
                @endif

                <button type="submit" class="blog_form_buttons">Отправить</button>
            </form>

            <form action="{{ route('profile.show') }}">
                <button class="blog_form_buttons">Вернуться в профиль</button>
            </form>
        </div>
    </div>
@endsection
