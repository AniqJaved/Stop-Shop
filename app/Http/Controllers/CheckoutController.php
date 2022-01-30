<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function stripe(){

        Stripe::setApiKey("sk_test_51Hi5GiJr7TcWtrcssfUvs9wxQS4hH62T2qAIblu6xGaxVfeObvYDMBVgpeyyeS2Eeg1jnKA9srkNoCO5KQJRmvof00sx2RssPT");

        $charge = Charge::create([
            'amount'=>Cart::total() * 100,
        'currency'=>'usd',
        'source'=>request()->stripeToken,
        'description'=>"ecommerce"
        ]);

        Session::flash('success','Your Payment is in conformation process');

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessfull());

        Cart::destroy();
        return redirect('/');
    }
}
