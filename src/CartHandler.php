<?php

namespace edfa3ly\Challenge;

use edfa3ly\Challenge\Currency\Currency;
use edfa3ly\Challenge\Prototype\CartReturn;
use edfa3ly\Challenge\Prototype\DiscountItem;
use edfa3ly\Challenge\Tax\VatTax;


class CartHandler implements IHandler
{
    private $products  = [];

    private $taxes = [];

    public function __construct(array $products, $taxes = [])
    {
        $this->products = $products;
        $this->taxes = $taxes;
    }

    public function handel() : CartReturn
    {
        $products = Mapper::mapProducts($this->products);
        $allTaxesValues = 0;
        $allDiscountValues = 0;
        $subTotalPrice = 0;
        $itemDiscounts = [];
        $discountPerItem = 0;
        foreach ($products as $key => $product) {
            if ($key == 3) {
                $product->setDiscountPercentageValue(50);
            }
            $allDiscountValues+= $discountPerItem = $product->getDiscountValue();

            if ($discountPerItem) {
                $itemDiscounts[] = new DiscountItem($product->getDiscountPercentageValue(), $product->getName(), $discountPerItem);
            }

            foreach ($this->taxes as $tax) {
                $allTaxesValues+= $product->getTaxValue($tax);
            }
            $subTotalPrice+= $product->getPriceInUsd();
        }

        return new CartReturn($allTaxesValues, $allDiscountValues, $itemDiscounts, $subTotalPrice);

    }

}
