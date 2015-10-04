<?php

namespace Shopware\Plugins\DsnRecommendation\Components\DemoData;

class DemoData
{
    /**
     * @var Items
     */
    private $items;

    public function __construct(Items $items)
    {
        $this->items = $items;
    }

    public function create()
    {
        $this->items->create();
    }
}