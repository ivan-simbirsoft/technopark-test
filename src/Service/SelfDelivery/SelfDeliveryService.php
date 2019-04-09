<?php

namespace Delivery\Service\SelfDelivery;

use Delivery\DeliveryOption;
use Delivery\DeliveryParameters;
use Delivery\Order;
use Delivery\Service\DeliveryServiceInterface;

class SelfDeliveryService implements DeliveryServiceInterface
{
    /**
     * @inheritDoc
     */
    public function isActive(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getDeliveryOption(Order $order, DeliveryParameters $parameters): ?DeliveryOption
    {
        $option = new DeliveryOption();

        $option->setPrice(0.0);
        $option->setDeliveryDate(new \DateTime());

        return $option;
    }
}
