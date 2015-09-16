<?php

namespace App\Http\Controllers;

use App\Models\Gameserver\MyShop;
use App\Models\Gameserver\Player;
use App\Models\Loginserver\AccountData;
use App\Models\Webserver\ShopCategory;
use App\Models\Webserver\ShopHistory;
use App\Models\Webserver\ShopItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

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
      $items = ShopItem::where('id_sub_category', '=', $id)->paginate(9);

      if($items->count() === 0) {
        return redirect(route('shop'))->with('error', Lang::get('flashmessage.shop.fail_category_id'));
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
        $account = AccountData::me(Session::get('user.id'))->first();

        if(Cart::total() === 0){ // If cart is empty -> Redirect to the shop page
            return redirect(route('shop'))->with('error', Lang::get('flashmessage.shop.empty_cart'));
        }
        else if($account->real < Cart::total()) { // If no real -> Redirect to the shop page
            return redirect()->back()->with('error', Lang::get('flashmessage.shop.not_real'));
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
                'player_id'     => $player_id,
                'player_name'   => $player->name,
                'item_id'       => $item->options['id_item'],
                'quantity'      => $item->qty,
                'price'         => $item->price,
                'name'          => $item->name,
            ]);
        }

        AccountData::me($account_id)->decrement('real', $total);
        Cart::destroy();

        return redirect(route('shop'))->with('success', Lang::get('flashmessage.shop.success').$player->name);
    }

}
