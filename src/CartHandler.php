<?php

namespace edfa3ly\Challenge;

use edfa3ly\Challenge\Prototype\CartReturn;
use edfa3ly\Challenge\Prototype\DiscountItem;


class CartHandler implements IHandler
{

    /**
     * @var array $products
     */
    private $products  = [];

    /**
     * @var array $taxes
     */
    private $taxes = [];

    /**
     * @var array $promotions
     */
    private $promotions= [];

    /**
     * CartHandler constructor.
     * @param array $products
     * @param array $taxes
     * @param array $promotions
     */
    public function __construct(array $products, $taxes = [], $promotions = [])
    {
        $this->products = $products;
        $this->taxes = $taxes;
        $this->promotions = $promotions;
    }

    /**
     * @return CartReturn
     */
    public function handel() : CartReturn
    {
        $products = Mapper::mapProducts($this->products);
        $allTaxesValues = 0;
        $allDiscountValues = 0;
        $subTotalPrice = 0;
        $itemDiscounts = [];
        $discountPerItem = 0;

        foreach ($products as $key => $product) {

            foreach ($this->promotions as $promotion) {
                $promotion->applyPromotionIfEligible($product, $products);
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
