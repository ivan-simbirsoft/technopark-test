<?php

namespace Delivery\Service\TurtleDelivery;

use Delivery\DeliveryOption;
use Delivery\DeliveryParameters;
use Delivery\Order;
use Delivery\Service\DeliveryServiceInterface;

class TurtleDeliveryService implements DeliveryServiceInterface
{
    /** @var string */
    private $baseUrl;

    /** @var TurtleDeliveryClient */
    private $client;

    public function __construct(string $baseUrl, TurtleDeliveryClient $client)
    {
        $this->baseUrl = $baseUrl;
        $this->client = $client;
    }

    public function isActive(): bool
    {
        return true;
    }

    public function getDeliveryOption(Order $order, DeliveryParameters $parameters): ?DeliveryOption
    {
        $response = $this->client->getResponse(
            $this->baseUrl,
            [
                'kladr' => $parameters->getKladr(),
                'name' => $order->getProduct()->getName()
            ]
        );

        return $this->parseResponse($order, $response);
    }

    protected function parseResponse(Order $order, TurtleDeliveryResponse $response): ?DeliveryOption
    {
        if (!$response->getError()) {
            $option = new DeliveryOption();
            $option->setPrice($response->getCoefficient() * $order->getProduct()->getPrice());
            $option->setDeliveryDate(
                (new \DateTime())->setTimestamp($response->getDate())
            );

            return $option;
        }
    }
}
