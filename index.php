<?php
require_once __DIR__.'/vendor/autoload.php';

use edfa3ly\Challenge\CartHandler;
use edfa3ly\Challenge\CurrencyHandler;
use edfa3ly\Challenge\Tax\VatTax;
use edfa3ly\Challenge\Output\CommandLineOutput;
use edfa3ly\Challenge\Promotions\Promotion;
use edfa3ly\Challenge\Prototype\Promotion\Rule;
use edfa3ly\Challenge\Prototype\Promotion\Action;
use edfa3ly\Challenge\Currency\CurrencyFactory;


$data  = ['T-shirt'];
//$data = array_splice($_SERVER['argv'], 3);

$currency = 'EGP';
//$currency = substr($_SERVER['argv'][2], strpos( $_SERVER['argv'][2], '=') + 1);

$taxes = [new VatTax()];

$promotionObject = new Promotion();
$promotionObject->addRule(new Rule( 'T-shirt',  2));
$promotionObject->addAction(new Action('Jacket','discount',  50));
$promotions = [$promotionObject];

print_r((new CommandLineOutput((new CurrencyHandler(new CartHandler($data, $taxes, $promotions), CurrencyFactory::getCurrency($currency)))))->getOutputSentence());
