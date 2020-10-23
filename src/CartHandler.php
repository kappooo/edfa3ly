<?php

namespace edfa3ly\Challenge;

use edfa3ly\Challenge\Currency\Currency;
use edfa3ly\Challenge\Prototype\CartReturn;
use edfa3ly\Challenge\Prototype\DiscountItem;
use edfa3ly\Challenge\Tax\VatTax;


class CartHandler implements IHandler
{
    private $products  = [];

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function handel() : CartReturn
    {
        $products = Mapper::mapProducts($this->products);
        $taxes = [new VatTax()];

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

            foreach ($taxes as $tax) {
                $allTaxesValues+= $product->getTaxValue($tax);
            }
            $subTotalPrice+= $product->getPriceInUsd();
        }

        return new CartReturn($allTaxesValues, $allDiscountValues, $itemDiscounts, $subTotalPrice);

    }

}
