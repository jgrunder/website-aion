@extends('_layouts.master')

@section('title', 'Joueurs en lignes')

@section('content')
  <div class="container_single">
    <div class="container_single_top">
      <h1>Joueurs en lignes</h1>
    </div>
    <div class="container_single_body">
      @if(count($users) === 0)
          <center>Aucun joueurs en lignes</center>
      @else
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Nom</th>
              <th>Faction</th>
              <th>Classe</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td class="strong">1</td>
                <td>{{$user->name}}</td>
                <td>{{Lang::get('aion.race_name.'.$user->race)}}</td>
                <td>{{Lang::get('aion.class_name.'.$user->player_class)}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>
@stop