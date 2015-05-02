@extends('_layouts.master')

@section('title', 'Home')

@section('content')
    <h1>{{Lang::get('home.test')}} page</h1>

    @include('_modules.vote')

    @foreach ($users as $user)
        <p>This is user {{ $user->name }}</p>
    @endforeach
@stop