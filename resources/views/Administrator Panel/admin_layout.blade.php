<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Administrator</title>
</head>
<body>

<div class="widget">
    <ul class="widget-list">
            <div class="users_button">
                <li><a href="{{ route('users.show') }}">Пользователи</a></li>
            </div>
            <div class="article_button">
                <li><a href="" >Записи</a></li>
            </div>
            <div class="activity_button">
                <li><a href="{{ route('activity.show') }}" >Активность</a></li>
            </div>
    </ul>
</div>

    @yield('content')

</body>
</html>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
    }

    .widget {
        padding-top: 20%;
        position: fixed;
        height: 100%;
        background-color: #333333;
        width: 15%;
    }

    .widget-list > div > li {
        padding: 10px;
        list-style-type: none;
    }

    a{
        text-decoration: none;
        font-family: 'Montserrat', sans-serif;
        color: white;
        transition: 0.5s;
    }

    a:hover {
        color: black;
    }

    body {
        background: linear-gradient(to right, #333 10%, #093a57 30%, #093a57 70%, #333 90%);
    }

    * {
        font-family: 'Montserrat', sans-serif;
    }

    .outer {
        padding-left: 17%;
        width: 97%;
        margin-top: 10px;
    }
</style>
