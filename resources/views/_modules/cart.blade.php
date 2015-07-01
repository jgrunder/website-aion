@if ($total > 0)
    <table>
        <thead>
        <tr>
            <th width="45%">Nom</th>
            <th>Price</th>
            <th width="15%">QT</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items_cart as $item)
            <tr>
                <td width="45%">{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td width="15%">{{$item->qty}}</td>
                <td><a href="#" data-id="{{$item->options['id_item']}}" class="fa fa-trash-o removeItemInCart"></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="#" class="btn">Acheter ({{$total}}Toll)</a>
    <a href="#" class="btn gift_button">Cadeau ({{$total}}Toll)</a>
@endif