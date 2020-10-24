<?php
require_once __DIR__.'/vendor/autoload.php';

use edfa3ly\Challenge\CartHandler;
use edfa3ly\Challenge\CurrencyHandler;
use edfa3ly\Challenge\Currency\{EGP, USD};
use edfa3ly\Challenge\Tax\VatTax;
use edfa3ly\Challenge\Output\HtmlOutput;
$data = [
    'T-shirt',
    'Pants'
];
$taxes = [new VatTax()];
print_r((new HtmlOutput((new CurrencyHandler(new CartHandler($data, $taxes), new EGP()))))->getOutputSentence());


