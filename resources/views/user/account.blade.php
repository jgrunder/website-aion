@extends('_layouts.master')

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
                    </ul>

                    <a href="{{Route('user.account.edit')}}" class="btn btn-small">Modifier mon compte</a>

                    <br><br>

                    <h2>Boutique :</h2>

                    Vous avez sur votre compte <strong class="text-blue">{{$user['real']}} Reals</strong>
                    et vous avez dépensé <strong class="text-blue">@if(!$level) 0€ @else {{$level['total'].'€'}} @endif </strong><br>

                    Pour atteindre le niveau  <strong class="text-blue">{{$nextLevel['level']}}</strong> dans la boutique vous devez dépenser <strong class="text-blue">{{$nextLevel['price']}}€</strong>

                    <br><br>

                    <h2>Mes Personnages :</h2>
                    <table>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Faction</th>
                            <th>Classe</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($players as $index => $player)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$player->name}}</td>
                                <td><span class="{{Lang::get('aion.race_logo.'.$player->race)}}"></span></td>
                                <td><span class="charactericon-class {{Lang::get('aion.class_logo.'.$player->player_class)}}"></span></td>
                                <td><a class="btnUnluckPlayer" player-id="{{$player->id}}" account-id="{{Session::get('user.id')}}">Débloquer</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="news_footer"></div>

            </div>

        </div>
        <!-- RIGHT SIDEBAR -->
        <div class="container_right">
            @include('_modules.right_sidebar')
        </div>
    </div>
@stop
