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
              <li>Rôle : {{Lang::get('aion.roles.'.$user['access_level'])}}</li>
            </ul>
            <br>
            <h2>Mes Personnages :</h2>
            <!-- <table>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nom</th>
                  <th>Faction</th>
                  <th>Classe</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="strong">1</td>
                  <td>
                    <a href="#">Mathieu</a>
                  </td>
                  <td>
                    <span class="icon_asmo"></span>
                  </td>
                  <td>
                    <span class="charactericon-class icon_emblem_artist"></span>
                  </td>
                </tr>
                <tr>
                  <td class="strong">2</td>
                  <td>
                    <a href="#">Maxime</a>
                  </td>
                  <td>
                    <span class="icon_elyos"></span>
                  </td>
                  <td>
                    <span class="charactericon-class icon_emblem_gunner"></span>
                  </td>
                </tr>
                <tr>
                  <td class="strong">3</td>
                  <td>
                    <a href="#">Titi</a>
                  </td>
                  <td>
                    <span class="icon_elyos"></span>
                  </td>
                  <td>
                    <span class="charactericon-class icon_emblem_cleric"></span>
                  </td>
                </tr>
            </table> -->
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
