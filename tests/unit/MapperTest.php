<?php


namespace unit\Products;

use edfa3ly\Challenge\Exceptions\NotFoundProduct;
use edfa3ly\Challenge\Mapper;
use edfa3ly\Challenge\Products\Jacket;
use edfa3ly\Challenge\Products\Pants;
use edfa3ly\Challenge\Products\Shoes;
use edfa3ly\Challenge\Products\TShirt;
use PHPUnit\Framework\TestCase;

class MapperTest extends TestCase
{


    public function test_get_class_from_product_name()
    {
        return $this->assertInstanceOf(Pants::class, Mapper::getClassOfProduct('pants'));
    }

    public function test_map_products()
    {
        $products = Mapper::mapProducts(['T-shirt', 'Jacket', 'Shoes']);
        $productClasses = [TShirt::class, Jacket::class, Shoes::class];
        foreach ($products as $key => $product) {
            $this->assertInstanceOf($productClasses[$key], $product);

        }
    }

    public function test_not_found_product()
    {
        $this->expectException(NotFoundProduct::class);
        $product = Mapper::getClassOfProduct('hat');
    }

    public function test_no_porduct_found_in_products_item()
    {
        $this->expectException(NotFoundProduct::class);
        $products = Mapper::mapProducts(['T-shirt', 'Jacket', 'belt']);
    }

}
