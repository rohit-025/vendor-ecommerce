<?php
// This example sets up an endpoint using the Slim framework.
// Watch this video to get started: https://youtu.be/sGcNPFX1Ph4.


use Illuminate\Http\Request;


require 'vendor/autoload.php';

// $app = new Slim\App;

// $app->add(function ($request, $response, $next) {
//   \Stripe\Stripe::setApiKey('sk_test_51JcwEUSFJ6kCC3JkhV9k2B1BRxf10Zfkknd2gLNunFipbGrG7MiEvKDTF4lTk1uGgUhBcAgVw29k0wX0oCfPJGs300R666cfH6');
//   return $next($request, $response);
// });
class Payment{
    function payment(Request $request, Response $response) {
        $session = \Stripe\Checkout\Session::create([
          'payment_method_types' => ['card'],
          'line_items' => [[
            'price_data' => [
              'currency' => 'usd',
              'product_data' => [
                'name' => 'T-shirt',
              ],
              'unit_amount' => 2000,
            ],
            'quantity' => 1,
          ]],
          'mode' => 'payment',
          'success_url' => 'https://example.com/success',
          'cancel_url' => 'https://example.com/cancel',
        ]);
      
        return $response->withHeader('Location', $session->url)->withStatus(303);
    }
      
}


