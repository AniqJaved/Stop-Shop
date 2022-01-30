<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;


class ShoppingController extends Controller
{

    public function add_to_cart(){



        $pdt = Product::findOrFail(request()->pdt_id);
//

        $cartItem= Cart::add([
            'id'=>$pdt->id,
            'name'=>$pdt->name,
            'qty'=>request()->qty,
            'price'=>$pdt->price
        ]);

        Cart::associate($cartItem->rowId,'App\Product');
        return redirect('/cart');
    }

    public function cart(){

        return view('cart');
    }

    public function cart_delete($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function cart_incr($id,$qty){
        Cart::update($id,$qty+1);
        return redirect()->back();
    }

    public function cart_decr($id,$qty){
        Cart::update($id,$qty-1);
        return redirect()->back();
    }

    public function cart_rapid($id){
        $pdt = Product::findOrFail($id);
//

        $cartItem= Cart::add([
            'id'=>$pdt->id,
            'name'=>$pdt->name,
            'qty'=>1,
            'price'=>$pdt->price
        ]);

        Cart::associate($cartItem->rowId,'App\Product');

        Session::flash('success','Product added successfully');
        return redirect('/cart');
    }
}
