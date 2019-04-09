<?php

namespace Delivery;

class DeliveryOption
{
    /** @var float Стоимость доставки*/
    private $price;

    /** @var \DateTime Дата доставки*/
    private $deliveryDate;

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return \DateTime
     */
    public function getDeliveryDate(): \DateTime
    {
        return $this->deliveryDate;
    }

    /**
     * @param \DateTime $deliveryDate
     */
    public function setDeliveryDate(\DateTime $deliveryDate): void
    {
        $this->deliveryDate = $deliveryDate;
    }
}
