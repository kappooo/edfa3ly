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


//$data = array_splice($_SERVER['argv'], 3);
//$currency = substr($_SERVER['argv'][2], strpos( $_SERVER['argv'][2], '=') + 1);

$data = ['T-shirt', 'T-shirt', 'Jacket', 'Shoes'];
$currency = 'EGP';

$taxes = [new VatTax()];

$promotionObject = new Promotion();
$promotionObject->addRule(new Rule( 'T-shirt',  2));
$promotionObject->addAction(new Action('Jacket','discount',  50));
$promotions = [$promotionObject];

print_r((new CommandLineOutput((new CurrencyHandler(new CartHandler($data, $taxes, $promotions), CurrencyFactory::getCurrency($currency)))))->getOutputSentence());

//php index.php createCart --bill-currency=USD T-shirt T-shirt shoes


use SebastianBergmann\CodeCoverage\Filter;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Report\Html\Facade as HtmlReport;

$filter = new Filter;
$filter->includeDirectory('/src');

$coverage = new CodeCoverage(
    (new Selector)->forLineCoverage($filter),
    $filter
);

$coverage->start('<name of test>');

// ...

$coverage->stop();


(new HtmlReport)->process($coverage, 'code-coverage-report');
