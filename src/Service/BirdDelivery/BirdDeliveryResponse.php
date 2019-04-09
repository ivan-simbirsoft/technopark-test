<?php

namespace Delivery\Service\BirdDelivery;

class BirdDeliveryResponse
{
    /** @var float */
    private $price;

    /** @var integer */
    private $period;

    /** @var string|null */
    private $error;

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param int $period
     */
    public function setPeriod(int $period): void
    {
        $this->period = $period;
    }

    /**
     * @param string $error
     */
    public function setError(string $error): void
    {
        $this->error = $error;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getPeriod(): int
    {
        return $this->period;
    }

    /**
     * @return string
     */
    public function getError(): ?string
    {
        return $this->error;
    }
}
