@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-info" role="alert">
            Форма обратной связи доступна толькло <a href="{{route('login')}}">авторизированным</a> пользователям.
        </div>
    </div>

@endsection
