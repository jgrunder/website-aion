@extends('_layouts.master')

@section('content')
    <h1>Top BG page</h1>
    @foreach($top as $player)
        <ul>
            <li>PlayerId :  {{$player->player_id}}</li>
            <li>Rating :    {{$player->rating}}</li>
            <li>Wins :      {{$player->wins}}</li>
            <li>Losses :    {{$player->losses}}</li>
            <li>Leaves :    {{$player->leaves}}</li>
            <li>Rank :      {{$player->rank}}</li>
        </ul>
    @endforeach
@stop
