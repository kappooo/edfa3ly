<?php
require_once __DIR__.'/vendor/autoload.php';

use edfa3ly\Challenge\CartHandler;

$data = [
    'T-shirt',
    'Pants'
];

print_r((new \edfa3ly\Challenge\CurrencyHandler(new CartHandler($data), new \edfa3ly\Challenge\Currency\EGP()))->getFormattedTextPerCurrency());


