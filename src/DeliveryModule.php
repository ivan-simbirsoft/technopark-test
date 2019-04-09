<?php

namespace Delivery;

use Delivery\Service\DeliveryServiceInterface;

class DeliveryModule
{
    /** @var DeliveryServiceInterface[] */
    private $deliveryServices = [];

    /**
     * @param DeliveryServiceInterface[] $deliveryServices
     */
    public function __construct(array $deliveryServices)
    {
        foreach ($deliveryServices as $service) {
            $this->addService($service);
        }
    }

    /**
     * Adds a delivery service.
     */
    public function addService(DeliveryServiceInterface $service)
    {
        $this->deliveryServices[get_class($service)] = $service;
    }

    /**
     * Gets delivery option for specified delivery service.
     */
    public function getDeliveryOptionByService(Order $order, DeliveryParameters $parameters, DeliveryServiceInterface $service): ?DeliveryOption
    {
        return $service->getDeliveryOption($order, $parameters);
    }

    /**
     * Gets delivery options for all registered delivery services.
     *
     * @return DeliveryOption[]
     */
    public function getDeliveryOptions(Order $order, DeliveryParameters $parameters): array
    {
        $options = [];

        foreach ($this->deliveryServices as $key => $service) {
            if ($service->isActive()) {
                if ($option = $this->getDeliveryOptionByService($order, $parameters, $service)) {
                    $options[$key] = $option;
                }
            }
        }

        return $options;
    }
}
