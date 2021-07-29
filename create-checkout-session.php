<?php

require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51JIQJSGl0EVdh83iP5i1kDV2nAtlX9h7VBITJbEqvWJiqGq7JF16DtXRlnxdrsZmkXVgUjVEjSfFnYSMsOU0K6xP00d7ZGqhWI');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:4242';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => [
    'card',
  ],
  'line_items' => [[
    # TODO: replace this with the `price` of the product you want to sell
    'price' => '{{PRICE_ID}}',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);