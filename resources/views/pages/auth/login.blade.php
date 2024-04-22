@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    <div class="container">
        <h1>Login</h1>

        <form action="{{ route('page.loginUser') }}" method="POST" class="row g-3">
            @csrf

            <div class="col-md-6">
                <label for="login" class="form-label">Имя пользователя:</label>
                <input type="text" name="login" id="login" class="form-control" placeholder="Имя пользователя">
                @if ($errors->has('login'))
                    <div class="alert alert-danger">{{ $errors->first('login') }}</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Секретный пароль:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Секретный пароль">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Вход</button>
            </div>
        </form>
    </div>
@endsection
