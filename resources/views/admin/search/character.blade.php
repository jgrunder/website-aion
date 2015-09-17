<table class="table">
    <thead>
    <tr>
        <th>Nom</th>
        <th>N° compte</th>
        <th>Nom de compte</th>
        <th>Race</th>
        <th>Classe</th>
        <th class="text-center">En ligne ?</th>
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
            <td class="text-center"> @if($result->online == 1) Oui @else Non @endif </td>
        </tr>
    @endforeach
    </tbody>
</table>