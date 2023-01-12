@extends('admin_layout')

@section('content')
    <div class="outer">
        <div class="inner">
            @foreach($users as $user)
                <div class="user">
                    <form action="{{ route('admin.change') }}" method="post" class="form">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <input type="text" value="{{ $user['id'] }}" class="id" name="id" readonly placeholder="id">
                        <input type="email" value="{{ $user['email'] }}" class="email" name="email" readonly placeholder="email">
                        <input type="text" value="{{ $user['name'] }}" class="name" name="name" readonly placeholder="name">
                        <input type="text" value="{{ $user['surname'] }}" class="surname" name="surname" readonly placeholder="surname">
                        <input type="text" value="{{ $user['phonenumber'] }}" class="phonenumber" name="phonenumber" readonly placeholder="phonenumber">
                        <input type="text" value="{{ $user['created_at'] }}" class="create_date" name="create_date" readonly placeholder="create_date">
                        <input type="text" value="{{ $user['updated_at'] }}" class="update_date" name="update_date" readonly placeholder="update_date">
                        <select name="permissions">
                            <option value= @if($user['permissions'] == 'user') selected @endif >User</option>
                            <option value="moderator" @if($user['permissions'] == 'moderator') selected @endif>Moderator</option>
                            <option value="admin" @if($user['permissions'] == 'admin') selected @endif>Admin</option>
                        </select>

                        <button class="btn" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

@endsection


<style>
    * {
        font-family: 'Montserrat', sans-serif;
    }

    .outer {
        padding-left: 17%;
        width: 97%;
        margin-top: 10px;
    }

    .user {
        background-color: #636b6f;
        margin-bottom: 10px;
        border: 1px solid black;
        border-radius: 10px;
        padding: 5px;
    }

    input, select {
        border-radius: 10px;
    }

    .id {
        width: 5%;
        text-align: center;
    }

    .email {
        width: 29%;
    }

    .name, .surname, .phonenumber {
        width: 9%;
    }

    .create_date, .update_date {
        width: 12%;
    }

    .btn {
        background-color: rgba(0, 0, 0, 0);
        border-radius: 10px;
    }
</style>
