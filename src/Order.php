<?php

namespace Delivery;

class Order
{
    /** @var Product */
    private $product;

    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }
}
