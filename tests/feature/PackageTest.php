<?php


namespace feature;


use edfa3ly\Challenge\CartHandler;
use edfa3ly\Challenge\Currency\EGP;
use edfa3ly\Challenge\Currency\USD;
use edfa3ly\Challenge\CurrencyHandler;
use edfa3ly\Challenge\Output\CommandLineOutput;
use edfa3ly\Challenge\Promotions\Promotion;
use edfa3ly\Challenge\Prototype\Promotion\Action;
use edfa3ly\Challenge\Prototype\Promotion\Rule;
use edfa3ly\Challenge\Tax\VatTax;
use PHPUnit\Framework\TestCase;


class PackageTest extends TestCase
{
    public function test_products_with_no_discount_in_usd_currency()
    {
        $obj = new CommandLineOutput(new CurrencyHandler(new CartHandler(['pants', 'jacket'], [new VatTax()]), new USD()));

        $pantsPrice = 14.99;
        $jacketPrice = 19.99;
        $vatPercentage = 14;
        $total = ($pantsPrice + $pantsPrice * $vatPercentage/100) + ($jacketPrice + $jacketPrice * $vatPercentage/100);

        $this->assertTrue(strpos($obj->getOutputSentence(), 'Total: $'.$total) !== false);
    }

    public function test_products_with_no_discount_in_egp_currency()
    {
        $obj = new CommandLineOutput(new CurrencyHandler(new CartHandler(['pants', 'jacket'], [new VatTax()]), new EGP()));

        $pantsPrice = 14.99;
        $jacketPrice = 19.99;
        $vatPercentage = 14;
        $total = ($pantsPrice + $pantsPrice * $vatPercentage/100) + ($jacketPrice + $jacketPrice * $vatPercentage/100);
        $total = round($total * 15.7428, 4);

        $this->assertTrue(strpos($obj->getOutputSentence(), 'Total: '.$total.' e£') !== false);
    }

    public function test_products_with_discount_in_egp_currency()
    {
        $promotionObject = new Promotion();
        $promotionObject->addRule(new Rule( 'T-shirt',  2));
        $promotionObject->addAction(new Action('Jacket','discount',  50));

        $obj = new CommandLineOutput(
            new CurrencyHandler(
                new CartHandler(
                    ['t-shirt', 't-shirt','shoes', 'jacket'],
                    [new VatTax()],
                    [$promotionObject]
                ),
                new EGP()
            )
        );

        $tShirtPrice = 2*10.99;
        $jacketPrice = 19.99;
        $shoesPrice =  24.99;
        $vatPercentage = 14;
        $total = ($tShirtPrice + $tShirtPrice * $vatPercentage/100) +
            ($jacketPrice + ($jacketPrice * $vatPercentage/100) - ($jacketPrice * 50/100)) +
            (($shoesPrice + $shoesPrice * $vatPercentage/100) - $shoesPrice * 10/100)
        ;
        $total = round($total * 15.7428, 4);
        $this->assertTrue(strpos($obj->getOutputSentence(), 'Total: '.$total.' e£') !== false);
    }

    public function test_products_with_discount_in_usd_currency()
    {
        $promotionObject = new Promotion();
        $promotionObject->addRule(new Rule( 'T-shirt',  2));
        $promotionObject->addAction(new Action('Jacket','discount',  50));

        $obj = new CommandLineOutput(
            new CurrencyHandler(
                new CartHandler(
                    ['t-shirt', 't-shirt','shoes', 'jacket'],
                    [new VatTax()],
                    [$promotionObject]
                ),
                new USD()
            )
        );

        $tShirtPrice = 2*10.99;
        $jacketPrice = 19.99;
        $shoesPrice =  24.99;
        $vatPercentage = 14;
        $total = ($tShirtPrice + $tShirtPrice * $vatPercentage/100) +
            ($jacketPrice + ($jacketPrice * $vatPercentage/100) - ($jacketPrice * 50/100)) +
            (($shoesPrice + $shoesPrice * $vatPercentage/100) - $shoesPrice * 10/100)
        ;
        $total = round($total , 4);
        $this->assertTrue(strpos($obj->getOutputSentence(), 'Total: $'.$total) !== false);
    }

}
