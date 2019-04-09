<?php

namespace Delivery\Service\BirdDelivery;

use Delivery\DeliveryOption;
use Delivery\DeliveryParameters;
use Delivery\Order;
use Delivery\Service\DeliveryServiceInterface;

class BirdDeliveryService implements DeliveryServiceInterface
{
    const OUT_OF_SERVICE_HOUR = 18;

    /** @var string */
    private $baseUrl;

    /** @var BirdDeliveryClient */
    private $client;

    /**
     * BirdDeliveryService constructor.
     * @param string $baseUrl
     */
    public function __construct(string $baseUrl, BirdDeliveryClient $client)
    {
        $this->baseUrl = $baseUrl;
        $this->client = $client;
    }

    /**
     * @inheritDoc
     */
    public function getDeliveryOption(Order $order, DeliveryParameters $parameters): ?DeliveryOption
    {
        $response = $this->client->getResponse(
            $this->baseUrl,
            [
                'kladr' => $parameters->getKladr(),
                'code' => $order->getProduct()->getCode()
            ]
        );

        try {
            return $this->parseResponse($response);
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Gets options from response
     */
    protected function parseResponse(BirdDeliveryResponse $response): ?DeliveryOption
    {
        if (!$response->getError()) {
            $option = new DeliveryOption();
            $option->setPrice($response->getPrice());
            $option->setDeliveryDate(
                (new \DateTime())->add(new \DateInterval('P' . $response->getPeriod() . 'D'))
            );

            return $option;
        }
    }

    /**
     * @inheritDoc
     */
    public function isActive(): bool
    {
        $orderTime = new \DateTime();

        $outOfServiceTime = (clone $orderTime)->setTime(self::OUT_OF_SERVICE_HOUR, 0);

        return ($orderTime) < $outOfServiceTime;
    }
}
