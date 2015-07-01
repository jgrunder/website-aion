<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Webserver\ShopCategory;
use App\Models\Webserver\ShopItem;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller {

    /**
     * GET /shop
     */
    public function index()
    {
      return view('shop.index', [
          'categories'      => ShopCategory::with('name')->get(),
          'items'           => [],
          'items_cart'      => Cart::content(),
          'total'           => Cart::total()
      ]);
    }

    /**
     * GET /shop/category/{id}
     */
    public function category($id)
    {
      $items = ShopItem::where('id_sub_category', '=', $id)->get();

      if($items->count() === 0) {
        return redirect(route('shop'))->with('error', "La catégorie n'existe pas");
      }

      return view('shop.index', [
          'categories'      => ShopCategory::with('name')->get(),
          'items'           => $items,
          'items_cart'      => Cart::content(),
          'total'           => Cart::total()
      ]);
    }

    /**
     * GET /shop/add/{id}
     */
    public function addToCart($id)
    {

        $item            = ShopItem::where('id_item', '=', $id)->first();
        $item_in_cart    = Cart::search(['id' => $id]);
        $content_in_cart = Cart::content();

        if($item->count() > 0) {

            if(!$item_in_cart) {
                Cart::add($id, $item->name, $item->quantity, $item->price, ['id_item' => $id]); // Add new Item in Cart
            } else {
                Cart::update($item_in_cart[0], $content_in_cart[$item_in_cart[0]]['qty'] + $item->quantity); // Update Quantity
            }

            return view('_modules.cart', [
                'items_cart'      => Cart::content(),
                'total'           => Cart::total()
            ]);

        }

    }

    /**
     * GET /shop/remove/{rowId}
     */
    public function RemoveToCart($id)
    {

        $item               = ShopItem::where('id_item', '=', $id)->first();
        $item_in_cart       = Cart::search(['id' => $id]);
        $content_in_cart    = Cart::content();
        $newQt              = $content_in_cart[$item_in_cart[0]]['qty'] - $item->quantity;

        if($newQt == 0){
            Cart::remove($item_in_cart[0]);
        } else {
            Cart::update($item_in_cart[0], $content_in_cart[$item_in_cart[0]]['qty'] - $item->quantity);
        }

        return view('_modules.cart', [
            'items_cart'      => Cart::content(),
            'total'           => Cart::total()
        ]);

    }

}
