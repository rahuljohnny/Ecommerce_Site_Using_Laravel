<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*

Route::post('/payment',function (){


    // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
    dd((float)Cart::total());

    \Stripe\Stripe::setApiKey("sk_test_dQ9PYlC588OqrrqLk8y4Nz9O");


// Token is created using Stripe.js or Checkout!
// Get the payment token ID submitted by the form:
    $token = $_POST['stripeToken'];

// Create a Customer:
    $customer = \Stripe\Customer::create(array(
        "email" => "paying.user@example.com",
        "source" => $token,
    ));

// Charge the Customer instead of the card:
    $charge = \Stripe\Charge::create(array(
        "amount" => Cart::total()*100,

        "currency" => "usd",
        "customer" => $customer->id
    ));

// YOUR CODE: Save the customer ID and other info in a database for later.
    dd($customer->id,"You have paid successfully!!");
    //return view('front.paymentStore');
});



/*
//TODO: to charge customer again(e.g. for monthly subscriptions)
Route::get('/charge',function()//TODO: the route is actually 'api/charge'
{
    $customer_id = \request(userId);//"cus_BVvtta1jcVEDl9";
    \Stripe\Stripe::setApiKey("sk_test_dQ9PYlC588OqrrqLk8y4Nz9O");

    // YOUR CODE (LATER): When it's time to charge the customer again, retrieve the customer ID.
    $charge = \Stripe\Charge::create(array(
        "amount" => 1500, // $15.00 this time
        "currency" => "usd",
        "customer" => $customer_id
    ));

    dd('success');
});

*/

//Route::post('/payment','CheckoutController@paymentTest')->name('lastStage.payment');
