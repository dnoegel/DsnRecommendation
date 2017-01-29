<?php

namespace DsnRecommendation;

class DsnRecommendation extends \Shopware\Components\Plugin
{
    public static function getSubscribedEvents()
    {
        require_once __DIR__ . '/vendor/autoload.php';

        return [];
    }
}
