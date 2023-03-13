@extends('Administrator Panel.admin_layout')

@section('content')

    <div class="outer">
        <div class="inner">
            <div class="users_field">

                <p style="text-align: center; color: white; font-weight: bold; margin: 5px">Пользователи</p>

                @foreach($users as $user)

                    <div class="user">
                        <input type="text" value="{{ $user['id'] }}" class="id_input" readonly>
                        <input type="text" value="{{ $user['email'] }}" class="email_input" readonly>
                        <input type="text" value="{{ $user['updated_at'] }}" class="date_input" readonly>
                    </div>

                @endforeach

            </div>
            <div class="activity_field">

                <p style="text-align: center; color: white; margin: 5px; font-weight: bold">Публикации</p>

                @foreach($articles as $article)
                    @php $model = $article; $email = $model->user->email; @endphp

                <div class="article">
                    <input type="text" value="{{ $article['id'] }}" class="id_input_article" readonly>
                    <input type="text" value="{{ $article['content'] }}" class="content_input_article" readonly>
                    <input type="text" value="{{ $email }}" class="email_input_article" readonly>
                    <input type="text" value="{{ $article['updated_at'] }}" class="date_input_article" readonly>
                </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection

<style>

    .activity_button {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .user, .article {
        margin-bottom: 5px;
        border-radius: 10px;

    }

    .inner {
        font-size: 14px;
    }

    .users_field {
        width: 40%;
        display: inline-block;
        float: left;
        text-align: center;
        overflow-y: scroll;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        height: 80%;
    }

    .activity_field {
        width: 57%;
        height: 80%;
        display: inline-block;
        float: left;
        margin-left: 10px;
        text-align: center;
        overflow-y: scroll;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
    }

    .id_input {
        width: 5%;
    }

    input {
        text-align: center;
        margin: 5px;

        border-radius: 10px;
    }

    .date_input {
        width: 28%;
    }

    .email_input {
        width: 55%;
    }
    .content_input_article {
        width: 25%;
    }

    .email_input_article {
        width: 27%;
    }

    .id_input_article {
        width: 5%;
    }


</style>
