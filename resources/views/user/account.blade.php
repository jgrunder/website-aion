@extends('_layouts.master')

@section('title', 'Account')

@section('content')
    <h1>Account page</h1>
    <ul>
        <li>Username : {{$user['name']}}</li>
        <li>Pseudo : {{$user['pseudo']}}</li>
        <li>Mail : {{$user['email']}}</li>
        <li>Toll : {{$user['toll']}}</li>
        <li>Access Level : {{Lang::get('aion.roles.'.$user['access_level'])}}</li>
    </ul>
@stop