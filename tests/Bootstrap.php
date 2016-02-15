<?php

use \Shopware\Plugins\DsnRecommendation\Subscriber\Container;
require "./../../../../../../tests/Shopware/TestHelper.php";
require_once __DIR__ . '/../vendor/autoload.php';

/** @var Shopware_Plugins_Core_DsnRecommendation_Bootstrap $recoBootstrap */
$recoBootstrap = Shopware()->Plugins()->Core()->DsnRecommendation();
$container = $recoBootstrap->get('service_container');
$subscriber = new Container($container);
$recoBootstrap->get('events')->addSubscriber($subscriber);

$helper = \TestHelper::Instance();
$loader = $helper->Loader();
$pluginDir = __DIR__ . '/../';
$loader->registerNamespace('Shopware\\Plugins\\\DsnRecommendation', $pluginDir);

Shopware()->Front()->setRequest(new Enlight_Controller_Request_RequestHttp());