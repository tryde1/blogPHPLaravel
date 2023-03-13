<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Сайт</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/signin.css') !!}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="{{ URL::asset('css/style.css') }} " rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body {
            background: linear-gradient(to right, #333 10%, #093a57 30%, #093a57 70%, #333 90%);
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="logo_header" style="margin: 0 auto;">
            <a href="{{ route('blogs.show') }}" class="logo_a">
                <img src="{{ URL::asset('css/header_logo.png') }} " class="logo_header_img" alt="1" />
            </a>
        </div>
    </header>

    @yield('content')

    <footer>
        <p>Все права защищены</p>
        <p>Создатель: Ермак-Ермашко Алексей</p>
        <p></p>
    </footer>
</body>
</html>
