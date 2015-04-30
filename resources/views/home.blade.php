@extends('layouts.master')

@section('content')
    <p>Home page</p><br/>
    <ul>
        <li>
            <a href="{{route('subscribe')}}">Go to subscribe page</a>
        </li>
    </ul>
@stop