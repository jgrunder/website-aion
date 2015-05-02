@extends('_layouts.master')

@section('title', 'Login')

@section('content')
    <h1>Login page</h1>

    {!! Form::open() !!}

    {!! Form::label('username', 'Username') !!}
    {!! Form::text('username', null, ['placeholder' => 'Username']) !!}

    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', null, ['placeholder' => 'Password']) !!}

    <button>Login</button>

    {!! Form::close() !!}
@stop