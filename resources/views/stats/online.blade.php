@extends('_layouts.master')

@section('title', 'Players online')

@section('content')
    <h1>Online Player page</h1>

    @if(count($users) === 0)
        No players online
    @else
        @foreach($users as $user)
            <h2>{{$user->name}}</h2>
            <p>
                {{Lang::get('aion.race_name.'.$user->race)}}
                /
                {{Lang::get('aion.class_name.'.$user->player_class)}}
            </p>
        @endforeach
    @endif

@stop