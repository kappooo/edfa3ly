<?php

namespace edfa3ly\Challenge\Products;

class Shoes extends Product
{
    /**
     * @var float $priceInUsd
     */
    protected $priceInUsd = 24.99;

    protected $discountPercentage = 10;

    protected $name = 'shoes';
}
