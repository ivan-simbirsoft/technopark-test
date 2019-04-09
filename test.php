<?php

require './vendor/autoload.php';

use Delivery\DeliveryModule;
use Delivery\DeliveryParameters;
use Delivery\Order;
use Delivery\ProductRepository;
use Delivery\Service\BirdDelivery\BirdDeliveryClient;
use Delivery\Service\BirdDelivery\BirdDeliveryService;
use Delivery\Service\SelfDelivery\SelfDeliveryService;
use Delivery\Service\TurtleDelivery\TurtleDeliveryClient;
use Delivery\Service\TurtleDelivery\TurtleDeliveryService;




// DeliveryModule Initialization
$deliveryServices = [
    new BirdDeliveryService('http://birddelivery.com', new BirdDeliveryClient()),
    new TurtleDeliveryService('http://turtledelivery.com', new TurtleDeliveryClient()),
    new SelfDeliveryService(),
];

$deliveryModule = new DeliveryModule($deliveryServices);



$kladr = 'Москва, Путину.';
$productCode = 'product1';

$order = new Order();
$order->setProduct(ProductRepository::getByCode($productCode));

$deliveryParams = new DeliveryParameters($kladr);

$deliveryOptions = $deliveryModule->getDeliveryOptions($order, $deliveryParams);

foreach ($deliveryOptions as $service=>$option)
{
    echo "Сервис $service. Стоимость: " . $option->getPrice() . ". Дата доставки: " . $option->getDeliveryDate()->format('Y-m-d') . '.' . PHP_EOL;
}
