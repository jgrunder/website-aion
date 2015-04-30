@extends('layouts.master')

@section('content')
    <p>Home page</p><br/>
    <ul>
        <li>
            <a href="{{route('subscribe')}}">Go to subscribe page</a>
        </li>
        <li>
            <a href="{{route('login')}}">Go to login page</a>
        </li>
        <li>
            <a href="{{route('shop')}}">Go to shop page</a>
        </li>
    </ul>
@stop