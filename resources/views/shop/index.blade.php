@extends('_layouts.master')

@section('title', 'Boutique')

@section('content')
    <div class="container">
        <!-- LEFT CONTENT -->
        <div class="container_left">
            <div class="news">
                <div class="news_top">
                    <h2>Boutique @if(isset($top)) (Meilleurs ventes) @endif</h2>
                </div>
                <div class="news_body shop_container">

                    @foreach($items as $item)
                        <div class="item_shop">

                            <h3>
                                <img src="" alt="">
                                <a href="http://aiondatabase.net/{{Cookie::get('language')}}/item/{{$item->id_item}}" target="_blank" class="databaseItem quality-{{\Illuminate\Support\Str::lower($item->quality_item)}}" data-id="{{$item->id_item}}">
                                    {{\Illuminate\Support\Str::limit($item->name, 20, '...')}}
                                </a>
                            </h3>

                            <ul>
                                <li class="quantity">Quantité : <strong class="value">{{$item->quantity}}</strong></li>
                                <li class="price">Prix :  <strong class="value">{{$item->price}}</strong></li>
                                <li class="price">Niveau :  <strong class="value">{{$item->level}}</strong></li>
                            </ul>

                            <div class="buttons">
                                @if((isset($accountLevel->level) && $accountLevel->level >= $item->level) || (!isset($accountLevel) && $item->level == 0))
                                    <a href="#" class="addItemInCart" data-id="{{$item->id_item}}">Add</a>
                                @else
                                    <a style="opacity: 0;"></a>
                                @endif
                                <a href="#" class="previewItem" data-id="{{$item->id_item}}">Preview</a>
                            </div>

                        </div>
                    @endforeach

                </div>
                <div class="news_footer">
                    @if(!isset($top)) {!! $items->render() !!} @endif
                </div>
            </div>
        </div>
        <!-- RIGHT SIDEBAR -->
        <div class="container_right">

            <!-- CART -->
            <div class="bloc_with_header bloc_vote">
                <div class="bloc_header">
                    <h2>Panier</h2>
                    <p>Vous pouvez supprimer un élément en cliquant sur la poubelle</p>
                </div>
                <div class="bloc_body center container_shop_cart">
                    @include('_modules.cart')
                </div>
            </div>

            <!-- CATEGORIES -->
            <div class="bloc_with_header bloc_vote">
                <div class="bloc_header">
                    <h2>Catégories</h2>
                    <p>Des sous-catégories sont disponibles</p>
                </div>
                <div class="bloc_body center container_shop_categories">

                    <ul class="categories">
                        @foreach($categories as $index => $category)
                            <li class="top_categorie">
                                <h4>> {{$category->category_name}}</h4>
                                <ul class="sub_categorie" style="display: none; font-size: 12px">
                                    @foreach($category->name as $sub_category)
                                        <li><a href="/shop/category/{{$sub_category->id}}">{{$sub_category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

        </div>
    </div>
@stop
