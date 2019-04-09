<?php

namespace Delivery;

class DeliveryParameters
{
    /** @var string Адрес доставки*/
    private $kladr;

    public function __construct(string $kladr)
    {
        $this->kladr = $kladr;
    }

    /**
     * @return string
     */
    public function getKladr(): string
    {
        return $this->kladr;
    }

    /**
     * @param string $kladr
     */
    public function setKladr(string $kladr): void
    {
        $this->kladr = $kladr;
    }
}
