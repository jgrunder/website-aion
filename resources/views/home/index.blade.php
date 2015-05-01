@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <p>Home Page</p>
    @foreach ($users as $user)
        <p>This is user {{ $user->name }}</p>
    @endforeach
@stop