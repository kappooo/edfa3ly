<?php
require_once __DIR__.'/vendor/autoload.php';

use edfa3ly\Challenge\Products\Shoes;
use edfa3ly\Challenge\Mapper;

$data = [
    'T-shirt',
    'T-shirt',
    'Shoes',
    'Jacket'
];


$products = Mapper::mapProducts($data);
foreach ($products as $key => $product) {
    if ($key == 3) {
        $product->setDiscountPercentageValue(50);
    }
    var_dump($product->getDiscountValue());
}
var_dump($products);

