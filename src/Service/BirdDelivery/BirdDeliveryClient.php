<?php

namespace Delivery\Service\BirdDelivery;

class BirdDeliveryClient
{
    /**
     * Performs request to a external web service.
     */
    public function getResponse(string $url, array $parameters): BirdDeliveryResponse
    {
        $response = new BirdDeliveryResponse();
        $response->setPrice('123.45');
        $response->setPeriod('12');

        return $response;
    }
}
