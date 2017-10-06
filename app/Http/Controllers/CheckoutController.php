<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;



class CheckoutController extends Controller
{

    public function shipping()
    {
        return view('front.shipping-info');
    }

    public function payment()
    {
        $amount = Cart::total();

        return view('front.payment',compact('amount'));
    }

    public function paymentTest()
    {

        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys

        \Stripe\Stripe::setApiKey("sk_test_dQ9PYlC588OqrrqLk8y4Nz9O");

        //dd('cart total ',Cart::total());


        // Token is created using Stripe.js or Checkout!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        //$token = $request->stripeToken;

        // Create a Customer:
        $customer = \Stripe\Customer::create(array(
            "email" => "paying.user@example.com",
            "source" => $token,
        ));


        // Charge the Customer instead of the card:
        $charge = \Stripe\Charge::create(array(
            "amount" => (float)Cart::total() * 100,
            //"amount" => 32100,

            "currency" => "usd",
            "customer" => $customer->id
        ));

        // YOUR CODE: Save the customer ID and other info in a database for later.
        //return view('front.paymentStore');

        //Create the order
        Order::createOrder();

        return "Ordered!!";

        dd($customer->id, "You have paid successfully!! ", $charge['amount']);

    }

    //TODO: to charge customer again(e.g. for monthly subscriptions)
    public function chargeAgain()//TODO: the route is actually 'api/charge'
    {
        $customer_id = "cus_BVvtta1jcVEDl9";
        \Stripe\Stripe::setApiKey("sk_test_dQ9PYlC588OqrrqLk8y4Nz9O");

        // YOUR CODE (LATER): When it's time to charge the customer again, retrieve the customer ID.
        $charge = \Stripe\Charge::create(array(
            "amount" => 1500, // $15.00 this time
            "currency" => "usd",
            "customer" => $customer_id
        ));

        dd('success');
    }


}
