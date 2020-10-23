<?php


namespace edfa3ly\Challenge;


use edfa3ly\Challenge\Prototype\CartReturn;

interface IHandler
{
    public function __construct(array $products);

    public function handel() : CartReturn;
}
