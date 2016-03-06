@extends('_layouts.master')

@section('content')
    <div class="container_single">
        <div class="container_single_top">
            <h1>{{Lang::get('all.nav.legions')}}</h1>
        </div>
        <div class="container_single_body">
            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Level</th>
                    <th>Points</th>
                </tr>
                </thead>
                <tbody>
                @foreach($legions as $index => $legion)
                    <tr>
                        <td class="strong">{{$index + 1}}</td>
                        <td>{{$legion->name}}</td>
                        <td>{{$legion->level}}</td>
                        <td>{{$legion->contribution_points}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            {!! $legions->render() !!}
        </div>
    </div>
@stop
