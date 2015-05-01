@extends('layouts.master')

@section('title', 'Subscribe')

@section('content')
    <h1>Subscribe page</h1>

    {!! Form::open() !!}

    	{!! Form::label('username', 'Username') !!}
    	{!! Form::text('username', null, ['placeholder' => 'Username']) !!}

    	{!! Form::label('password', 'Password') !!}
    	{!! Form::password('password', null, ['placeholder' => 'Password']) !!}

    	{!! Form::label('repeat_password', 'Password') !!}
    	{!! Form::password('repeat_password', null, ['placeholder' => 'Password']) !!}

    	{!! Form::label('email', 'Mail') !!}
    	{!! Form::email('email', null, ['placeholder' => 'Mail']) !!}

    	<button>Create account</button>

    {!! Form::close() !!}
@stop