<?php


namespace edfa3ly\Challenge;


use edfa3ly\Challenge\Products\Product;
use edfa3ly\Challenge\Prototype\CartReturn;

interface IHandler
{
    /**
     * IHandler constructor.
     * @param array<Product> $products
     */
    public function __construct(array $products);

    public function handel() : CartReturn;
}
