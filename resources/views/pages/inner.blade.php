@extends('layouts.layout')

@section('title', 'User')
@section('content')

    @if (Auth::check() && Auth::user()->isAdmin())
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    @endif


    {{-- @can('viewDashboard', Dashboard::class)
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    @endcan --}}

    Страница для авторизованных

@endsection
