@extends('_layouts.master')

@section('title', 'Home')

@section('content')
    <h1>{{Lang::get('home.test')}} page</h1>

    <!-- Servers Status -->
    <ul>
    @foreach($serversStatus as $value)
        <li>{{$value['name']}} : {{($value['status']) ? 'ON' : 'OFF'}}</li>
    @endforeach
        <li>There are {{$countPlayersOnline}} players online.</li>
    </ul>

    <!-- Menu -->
    <ul>
    @if(Session::has('connected'))
        <li><a href="{{Route('user.account')}}">My account</a></li>
        <li><a href="{{Route('user.logout')}}">Logout</a></li>
    @else
        <li><a href="{{Route('user.subscribe')}}">Inscription</a></li>
        <li><a href="{{Route('user.login')}}">Login</a></li>
    @endif
        <li><a href="{{Route('stats.online')}}">Players Online</a></li>
        <li><a href="{{Route('stats.abyss')}}">Top Abyss</a></li>
        <li><a href="{{Route('stats.bg')}}">Top BG</a></li>
    </ul>
    
    <ul>
        <li><a href="{{Route('page.contactus')}}">Contact Us</a></li>
        <li><a href="{{Route('page.teamspeak')}}">Teamspeak</a></li>
        <li><a href="{{Route('page.rules')}}">Rules</a></li>
        <li><a href="{{Route('page.team')}}">Team</a></li>
    </ul>

    <ul>
        <li><a href="{{Route('language', 'fr')}}">Change to FR</a></li>
        <li><a href="{{Route('language', 'en')}}">Change to EN</a></li>
    </ul>

    <!-- News -->
    <h1>News</h1>
    @include('_modules.news')

    <!-- VOTES -->
    <h1>Vote</h1>
    @include('_modules.vote')
@stop