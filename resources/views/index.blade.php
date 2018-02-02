@extends('layouts.app')

@section('content')
    @guest
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Добро Пожаловать!</h1>
            <p class="lead">Зарегистрируйтесь для использования сервиса.</p>
        </div>
    @else
        @include('archive', ['user' => Auth::user()])
    @endguest
@endsection