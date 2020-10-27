<?php

namespace unit;

use edfa3ly\Challenge\CartHandler;

use edfa3ly\Challenge\Promotions\Promotion;
use edfa3ly\Challenge\Prototype\CartReturn;
use edfa3ly\Challenge\Prototype\Promotion\Action;
use edfa3ly\Challenge\Prototype\Promotion\Rule;
use edfa3ly\Challenge\Tax\VatTax;
use PHPUnit\Framework\TestCase;

class CartHandlerTest extends TestCase
{
    public function test_cart_handel_process()
    {
        $promotionObject = new Promotion();
        $promotionObject->addRule(new Rule( 'T-shirt',  1));
        $promotionObject->addAction(new Action('Pants','discount',  30));
        $promotions = [$promotionObject];

        $cartReturnObject = (new CartHandler(['T-shirt', 'T-shirt', 'Pants'], [new VatTax()], $promotions))->handel();

        $tShirtPrice = 10.99;
        $pantsPrice = 14.99;
        $taxesValues = (($tShirtPrice * 2) * (14/100)) + ($pantsPrice * (14/100));

        $subTotalPrice = $tShirtPrice * 2 +  $pantsPrice;

        $discountPrice = $pantsPrice * (30/100);

        $this->assertInstanceOf(CartReturn::class, $cartReturnObject);
        $this->assertEquals($taxesValues, $cartReturnObject->getTotalTaxes());
        $this->assertEquals($subTotalPrice, $cartReturnObject->getSubTotalPrice());
        $this->assertEquals($discountPrice, $cartReturnObject->getTotalDiscount());


    }
}
