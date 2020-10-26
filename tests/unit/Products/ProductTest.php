<?php


namespace unit\Products;

use edfa3ly\Challenge\Mapper;
use edfa3ly\Challenge\Products\Jacket;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{

    public function test_map_product()
    {
        return $this->assertEquals(Jacket::class, get_class(Mapper::getClassOfProduct('jacket')));
    }

}
