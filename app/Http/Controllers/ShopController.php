<?php

namespace App\Http\Controllers;

use App\Models\Gameserver\MyShop;
use App\Models\Gameserver\Player;
use App\Models\Loginserver\AccountData;
use App\Models\Webserver\ShopCategory;
use App\Models\Webserver\ShopItem;
use App\Models\Webserver\ShopHistory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;

class ShopController extends Controller {

    /**
     * GET /shop
     */
    public function index()
    {
      $top_purchased = ShopItem::where('purchased', '>', 0)->orderBy('purchased', 'DESC')->take(6)->get();

      return view('shop.index', [
          'categories'      => ShopCategory::with('name')->get(),
          'top'             => true,
          'items'           => $top_purchased,
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
        return redirect(route('shop'))->with('error', "La catégorie est surement vide ou n'existe pas");
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
     * GET /shop/remove/{id}
     */
    public function removeToCart($id)
    {
        $item               = ShopItem::where('id_item', '=', $id)->first();
        $item_in_cart       = Cart::search(['id' => $id]);
        $content_in_cart    = Cart::content();
        $newQt              = $content_in_cart[$item_in_cart[0]]['qty'] - $item->quantity;

        if($newQt <= 0){
            Cart::remove($item_in_cart[0]);
        } else {
            Cart::update($item_in_cart[0], $content_in_cart[$item_in_cart[0]]['qty'] - $item->quantity);
        }

        return view('_modules.cart', [
            'items_cart'      => Cart::content(),
            'total'           => Cart::total()
        ]);
    }

    /**
     * GET /shop/buy
     */
    public function summary()
    {
        $account_toll = AccountData::me(Session::get('user.id'))->first();

        if(Cart::total() === 0){ // If cart is empty -> Redirect to the shop page
            return redirect(route('shop'))->with('error', "Votre panier est vide. Vous ne pouvez pas accéder à cette page");
        }
        else if($account_toll->toll < Cart::total()) { // If no toll -> Redirect to the shop page
            return redirect()->back()->with('error', "Vous n'avez pas assez de point toll sur votre compte");
        }

        $players        = Player::where('account_id', '=', Session::get('user.id'))->get();
        $players_array  = [];

        foreach($players as $player){
            $players_array[$player->id] = $player->name;
        }

        return view('shop.summary', [
            'categories'      => ShopCategory::with('name')->get(),
            'items_cart'      => Cart::content(),
            'total'           => Cart::total(),
            'players'         => $players_array
        ]);
    }

    /**
     * POST /shop/buy
     */
    public function buy()
    {
        $player_id  = Request::input('player_id');
        $player     = Player::where('id', '=', $player_id)->first();
        $total      = Cart::total();
        $account_id = Session::get('user.id');

        foreach(Cart::content() as $item){
            ShopItem::where('id_item', '=', $item->options['id_item'])->increment('purchased', 1);
            MyShop::create([
                'item'      => $item->options['id_item'],
                'nb'        => $item->qty,
                'player_id' => $player_id
            ]);
            ShopHistory::create([
                'account_id'    => $account_id,
                'item_id'       => $item->options['id_item'],
                'quantity'      => $item->qty,
                'price'         => $item->price,
                'name'          => $item->name,
            ]);
        }

        AccountData::me($account_id)->decrement('toll', $total);
        Cart::destroy();

        return redirect(route('shop'))->with('success', "Achat effectué, tapez la commande : .shop IG sur le personnage ".$player->name);
    }

}
