<?php

namespace Shopware\Plugins\DsnRecommendation\Components\DemoData;

class DemoData
{
    /**
     * @var Items
     */
    private $items;
    /**
     * @var Customer
     */
    private $customer;
    /**
     * @var Order
     */
    private $order;

    public function __construct(Items $items, Customer $customer, Order $order)
    {
        $this->items = $items;
        $this->customer = $customer;
        $this->order = $order;
    }

    public function create()
    {
        $this->items->create();
        $this->customer->create();
        $this->order->create();
    }
}
