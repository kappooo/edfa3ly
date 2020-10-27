<?php


namespace unit;


use edfa3ly\Challenge\Products\Jacket;
use edfa3ly\Challenge\Products\Pants;
use edfa3ly\Challenge\Products\Shoes;
use edfa3ly\Challenge\Tax\VatTax;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_get_jacket_price_in_usd()
    {
        $this->assertEquals(19.99, (new Jacket())->getPriceInUsd());
    }

    public function test_get_product_price_after_discount()
    {
        $shoesPrice = 24.99;
        $discountPercentage = 10;
        $shoesPriceAfterDiscount = $shoesPrice - ($shoesPrice * $discountPercentage/100);
        $this->assertEquals(10, (new Shoes())->getDiscountPercentageValue());
        $this->assertEquals($shoesPriceAfterDiscount, (new Shoes())->getPriceAfterDiscount());
        $this->assertEquals( $shoesPrice - $shoesPriceAfterDiscount, (new Shoes())->getDiscountValue());
    }


    public function test_get_product_price_after_taxes()
    {
        $shoesPrice = 24.99;
        $taxPercentage = 14;
        $shoesPriceAfterTax = $shoesPrice + ($shoesPrice * $taxPercentage/100);
        $this->assertEquals($shoesPriceAfterTax, (new Shoes())->getPriceAfterTax(new VatTax()));
        $this->assertEquals($shoesPriceAfterTax - $shoesPrice, (new Shoes())->getTaxValue(new VatTax()));
    }

    public function test_get_product_name_and_price()
    {
       $this->assertEquals(24.99, (new Shoes())->getPriceInUsd());
       $this->assertEquals('shoes', (new Shoes())->getName());
    }

    public function test_get_price_after_discount_to_product_which_not_have_discount()
    {
        $this->assertEquals(14.99, (new Pants())->getPriceAfterDiscount());
    }

}
