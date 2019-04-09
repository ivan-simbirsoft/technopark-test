<?php

namespace Delivery\Service\TurtleDelivery;

class TurtleDeliveryClient
{
    /**
     * Performs request to a external web service.
     */
    public function getResponse(string $url, array $parameters): ?TurtleDeliveryResponse
    {
        $response = new TurtleDeliveryResponse();
        $response->setCoefficient('0.33');
        $response->setDate(123121321);

        return $response;
    }
}
