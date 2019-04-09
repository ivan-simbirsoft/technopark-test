<?php

namespace Delivery\Service;

use Delivery\DeliveryOption;
use Delivery\DeliveryParameters;
use Delivery\Order;

interface DeliveryServiceInterface
{
    /**
     * Checks whether the service is active or inactive
     */
    public function isActive(): bool;

    /**
     * Gets delivery option for specified order.
     */
    public function getDeliveryOption(Order $order, DeliveryParameters $parameters): ?DeliveryOption;
}
