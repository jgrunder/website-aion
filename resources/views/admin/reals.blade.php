@extends('_layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center page-header">
                <h1>Reals</h1>
                <small>Historique des ajouts points reals</small>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">Envoyeur</th>
                        <th class="text-center">Receveur</th>
                        <th class="text-center">Reals</th>
                        <th class="text-center">Motif</th>
                        <th class="text-center">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reals as $real)
                        <tr>
                            <th scope="row" class="text-center">{{$real->sender_name}}</th>
                            <td class="text-center">{{$real->receiver_name}}</td>
                            <td class="text-center">{{$real->reals}}</td>
                            <td class="text-center">{{$real->reason}}</td>
                            @if (Carbon::parse($real->created_at)->isToday())
                                <td class="text-center text-success">{{$real->created_at}}</td>
                            @else
                                <td class="text-center">{{$real->created_at}}</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
