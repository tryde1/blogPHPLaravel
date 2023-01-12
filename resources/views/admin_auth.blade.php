<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrator</title>
</head>
<body>
<form action=" {{route('admin.authorize')}}" method="post" class="admin_auth_form">
    <div class="inner">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="form_auth">
            <input type="text" class="input" name="login">
            <label for="text">Имя пользователя</label>
        </div>
        <div class="form_auth">
            <input type="password" class="input" name="password">
            <label for="text">Пароль</label>
        </div>
        <div class="form_auth">
            <input type="submit" class="button">
        </div>

    </div>
</form>
</body>
</html>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        font-family: 'Montserrat', sans-serif;
    }

    .admin_auth_form {
        width: 100%;
        padding-top: 15%;
    }

    .input {
        border-radius: 10px;
        margin-bottom: 10px;
        margin-right: 20px;
        font-size: 16px;
    }

    .button {
        border-radius: 10px;
        margin: 20px auto 0 33%;
    }

    .inner {
        margin: 0 auto;
        background-color: rgba(46, 64, 83, 0.5);
        width: 40%;
        height: 200px;
        text-align: left;
        padding: 4% 0 4% 4%;
        border-radius: 10px;
        border: 2px solid white;
    }

    body {
        background: linear-gradient(to right, #333 10%, #093a57 30%, #093a57 70%, #333 90%);
    }
</style>
