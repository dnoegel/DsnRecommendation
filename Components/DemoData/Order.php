<?php

namespace Shopware\Plugins\DsnRecommendation\Components\DemoData;

class Order
{
    private $orders = [
        [
            'user' => 'wurstfinger@example.org',
            'items' => [
                'demo5', 'demo6', 'demo7', 'demo1', 'demo2'
            ]
        ],[
            'user' => 'jellyfish@example.org',
            'items' => [
                'demo5', 'demo6', 'demo7'
            ]
        ],[
            'user' => 'johanson@example.org',
            'items' => [
                'demo5', 'demo6', 'demo1', 'demo2'
            ]
        ],[
            'user' => 'mastercard@example.org',
            'items' => [
                'demo8', 'demo9', 'demo10'
            ]
        ],[
            'user' => 'snow@example.org',
            'items' => [
                'demo12', 'demo13', 'demo14'
            ]
        ],[
            'user' => 'glowfish@example.org',
            'items' => [
                'demo8', 'demo9', 'demo10', 'demo12', 'demo13', 'demo14'
            ]
        ],[
            'user' => 'frechmann@example.org',
            'items' => [
                'demo18', 'demo20'
            ]
        ],[
            'user' => 'mueller@example.org',
            'items' => [
                'demo18', 'demo20', 'demo22'
            ]
        ],[
            'user' => 'knickrig@example.org',
            'items' => [
                'demo18', 'demo20', 'demo22', 'demo21'
            ]
        ],
    ];

    public function create()
    {
    }
}
