<?php

namespace edfa3ly\Challenge;

use edfa3ly\Challenge\Products\{TShirt, Pants, Jaket, Shoes};

class Mapper
{
    const PRODUCTS_LIST = [
        'T-shirt' => TShirt::class,
        'Shoes' => Shoes::class,
        'Jacket' => Jaket::class,
        'Pants' => Pants::class,
    ];

    public static function mapProducts(array $data): array
    {
        return array_map(function ($item) {
            $class = static::PRODUCTS_LIST[$item];
            return (new $class());
        }, $data);
    }
}
