@extends('_layouts.master')

@section('title', 'Mon compte')

@section('content')
    <div class="container">
      <div class="container_left">

        <!-- CALL TO ACTION -->
        @include('_modules.call_to_action')

        <!-- NEWS -->
        <div class="news">
          <div class="news_top">
            <h1>Mon Compte</h1>
          </div>
          <div class="news_body">

            <h2>Mes informations :</h2>
            <ul>
              <li>Identifiant : {{$user['name']}}</li>
              <li>Pseudo d'affichage : {{$user['pseudo']}}</li>
              <li>Email : {{$user['email']}}</li>
              <li>Toll : {{$user['toll']}}</li>
            </ul>
            <br>
            <h2>Mes Personnages :</h2>
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
                  @foreach ($players as $index => $player)
                      <tr>
                          <td>{{$index + 1}}</td>
                          <td>{{$player->name}}</td>
                          <td><span class="{{Lang::get('aion.race_logo.'.$player->race)}}"></span></td>
                          <td><span class="charactericon-class {{Lang::get($player->player_class)}}"></span></td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
          <div class="news_footer">
          </div>
        </div>

      </div>
      <!-- RIGHT SIDEBAR -->
      <div class="container_right">
        @include('_modules.right_sidebar')
      </div>
    </div>
@stop
