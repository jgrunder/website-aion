<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Nombre d'achat</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            <th scope="row">{{$result->id_item}}</th>
            <td>
                <a href="http://aiondatabase.net/fr/item/{{$result->id_item}}" target="_blank">{{$result->name}}</a>
            </td>
            <td>{{$result->price}}</td>
            <td>{{$result->purchased}}</td>
            <td>
                <a class="btn btn-danger btn-xs" href="{{Route('admin.shop.edit', $result->id_item)}}">
                    <i class="fa fa-pencil-square-o"></i> Editer
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>