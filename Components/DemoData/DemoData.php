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

    public function __construct(Items $items, Customer $customer)
    {
        $this->items = $items;
        $this->customer = $customer;
    }

    public function create()
    {
        $this->customer->create();
        $this->items->create();
    }
}
