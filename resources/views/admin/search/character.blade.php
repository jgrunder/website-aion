<table class="table">
    <thead>
    <tr>
        <th>Nom</th>
        <th>N° compte</th>
        <th>Nom de compte</th>
        <th>Race</th>
        <th>Classe</th>
        <th>En ligne ?</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            <td>{{$result->name}}</td>
            <td>{{$result->account_id}}</td>
            <td>{{$result->account_name}}</td>
            <td>{{$result->race}}</td>
            <td>{{$result->player_class}}</td>
            <td>{{$result->online}}</td>
            <td>
                @if ($result->online == 1)
                    <a class="btn btn-warning btn-xs" href="">
                        <i class="fa fa-map-marker"></i> Débloquer
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>