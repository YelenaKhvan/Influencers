@extends('layouts.layout')

@section('title', 'Register')

@section('content')
    <div class="container">
        <h1>Register</h1>

        <form action="{{ route('page.createUser') }}" method="POST" class="row g-3">
            @csrf

            <div class="col-md-6">
                <label for="name" class="form-label">Имя:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Имя">
                @if ($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="surname" class="form-label">Фамилия:</label>
                <input type="text" name="surname" id="surname" class="form-control" placeholder="Фамилия">
                @if ($errors->has('surname'))
                    <div class="alert alert-danger">{{ $errors->first('surname') }}</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="midname" class="form-label">Отчество:</label>
                <input type="text" name="midname" id="midname" class="form-control" placeholder="Отчество">
                @if ($errors->has('midname'))
                    <div class="alert alert-danger">{{ $errors->first('midname') }}</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="login" class="form-label">Имя пользователя:</label>
                <input type="text" name="login" id="login" class="form-control" placeholder="Имя пользователя">
                @if ($errors->has('login'))
                    <div class="alert alert-danger">{{ $errors->first('login') }}</div>
                @endif
            </div>
            <div class="col-12">
                <label for="email" class="form-label">Адрес эл. почты:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Адрес эл. почты">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Секретный пароль:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Секретный пароль">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="repeat_password" class="form-label">Повторите пароль:</label>
                <input type="password" name="repeat_password" id="repeat_password" class="form-control"
                    placeholder="Повторите пароль">
                @if ($errors->has('repeat_password'))
                    <div class="alert alert-danger">{{ $errors->first('repeat_password') }}</div>
                @endif
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="rules" id="rules">
                    <label class="form-check-label" for="rules">Я согласен с правилами регистрации</label>
                </div>
                @if ($errors->has('rules'))
                    <div class="alert alert-danger">{{ $errors->first('rules') }}</div>
                @endif
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Регистрация</button>
            </div>
        </form>
    </div>
@endsection
