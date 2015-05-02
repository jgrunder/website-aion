@extends('_layouts.master')

@section('title', 'Home')

@section('content')
    <h1>{{Lang::get('home.test')}} page</h1>

    <ul>
        <li><a href="{{Route('user.subscribe')}}">Inscription</a></li>
        <li><a href="{{Route('user.login')}}">Login</a></li>
        <li><a href="{{Route('user.logout')}}">Logout</a></li>
    </ul>

    <ul>
        <li><a href="{{Route('language', 'fr')}}">Change to FR</a></li>
        <li><a href="{{Route('language', 'en')}}">Change to EN</a></li>
    </ul>

    @include('_modules.vote')
@stop