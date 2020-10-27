<?php

namespace edfa3ly\Challenge;

use edfa3ly\Challenge\Exceptions\NotFoundProduct;
use edfa3ly\Challenge\Products\{Product, TShirt, Pants, Jacket, Shoes};

class Mapper
{
    const PRODUCTS_LIST = [
        'T-shirt' => TShirt::class,
        'Shoes' => Shoes::class,
        'Jacket' => Jacket::class,
        'Pants' => Pants::class,
    ];

    /**
     * @param array<string> $data
     * @return array<Product>
     */
    public static function mapProducts(array $data): array
    {
        return array_map(function ($item) {
            if (!isset(static::PRODUCTS_LIST[ucwords($item)])) {
                throw new NotFoundProduct;
            }
            $class = static::PRODUCTS_LIST[ucwords($item)];
            return (new $class());
        }, $data);
    }

    /**
     * @param string $product_name
     * @return Product
     * @throws NotFoundProduct
     */
    public static function getClassOfProduct(string $product_name) : Product
    {
        if (!isset(static::PRODUCTS_LIST[ucwords($product_name)])) {
            throw new NotFoundProduct;
        }
        $class = static::PRODUCTS_LIST[ucwords($product_name)];
        return new $class();
    }
}
