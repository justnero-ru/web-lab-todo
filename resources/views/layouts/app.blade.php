<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WEB-программирование – СевГУ</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>

<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/">{{ config('app.name', 'ToDo') }}</a></h5>
    @guest
        <a class="btn btn-outline-primary mx-2" href="/login">Войти</a>
        <a class="btn btn-outline-primary mx-2" href="/register">Зарегистрироваться</a>
    @else
        <form action="{{ route('logout') }}" method="post" id="logout-form">
            <button type="submit" class="btn btn-outline-primary">Выйти</button>
            {{ csrf_field() }}
        </form>
    @endguest
</div>

@yield('content')

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
