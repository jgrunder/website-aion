@if ($total > 0)
    <table>
        <thead>
        <tr>
            <th width="45%">{{Lang::get('all.shop.name')}}</th>
            <th>{{Lang::get('all.shop.price')}}</th>
            <th width="15%">{{Lang::get('all.shop.qt')}}</th>
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

    <a href="{{Route('shop.summary')}}" class="btn">{{Lang::get('all.shop.buy')}} ({{$total}} Toll)</a>
    <!-- <a href="#" class="btn gift_button">{{Lang::get('all.shop.gift')}} ({{$total}} Toll)</a> -->
@endif