@extends('_layouts.master')

@section('title', 'Home')

@section('content')
    <h1>{{Lang::get('home.test')}} page</h1>

    <!-- Servers Status -->
    <ul>
    @foreach($serversStatus as $value)
        <li>{{$value['name']}} : {{($value['status']) ? 'ON' : 'OFF'}}</li>
    @endforeach
    </ul>

    <!-- Menu -->
    <ul>
    @if(Session::has('connected'))
        <li><a href="{{Route('user.logout')}}">Logout</a></li>
    @else
        <li><a href="{{Route('user.subscribe')}}">Inscription</a></li>
        <li><a href="{{Route('user.login')}}">Login</a></li>
    @endif
        <li><a href="{{Route('stats.online')}}">Players Online</a></li>
    </ul>

    <ul>
        <li><a href="{{Route('language', 'fr')}}">Change to FR</a></li>
        <li><a href="{{Route('language', 'en')}}">Change to EN</a></li>
    </ul>

    <!-- VOTES -->
    @include('_modules.vote')
@stop