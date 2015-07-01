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
              <h3><a href="http://aiondatabase.net/fr/item/{{$item->id_item}}" target="_blank">{{$item->name}}</a></h3>
              <ul>
                <li class="quantity">Quantity {{$item->quantity}}</li>
                <li class="price">Price {{$item->price}}</li>
              </ul>
              <div class="buttons">
                <a href="#" class="addItemInCart" data-id="{{$item->id_item}}">Add</a>
                <a href="#" class="previewItem" data-id="{{$item->id_item}}">Preview</a>
              </div>
            </div>
          @endforeach

        </div>
        <div class="news_footer"></div>
      </div>
    </div>
    <!-- RIGHT SIDEBAR -->
    <div class="container_right">

      <!-- CART -->
      <div class="bloc_with_header bloc_vote">
        <div class="bloc_header">
          <h2>Panier</h2>
        </div>
        <div class="bloc_body center container_shop_cart">
            @include('_modules.cart')
        </div>
      </div>

      <!-- CATEGORIES -->
      <div class="bloc_with_header bloc_vote">
        <div class="bloc_header">
          <h2>Catégories</h2>
          <p>Des sous-catégories son disponibles</p>
        </div>
        <div class="bloc_body center container_shop_categories">

          <ul class="categories">
            @foreach($categories as $index => $category)
              <li class="top_categorie">
                <h4>> {{$category->category_name}}</h4>
                <ul class="sub_categorie" style="display: @if ($index == 0) block @else none @endif">
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
