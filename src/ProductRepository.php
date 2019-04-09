<?php

namespace Delivery;

class ProductRepository
{
    public static function getByCode(string $code): ?Product
    {
        $product = new Product();

        $product->setPrice('1500.58');
        $product->setCode($code);
        $product->setName('name of product ' . $code);

        return $product;
    }
}
