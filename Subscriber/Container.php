<?php

namespace Shopware\Plugins\DsnRecommendation\Subscriber;

use Dnoegel\LazySubscriber\LazySubscriber;
use Shopware\Components\Api\Manager;
use Shopware\Components\Api\Resource\Article;
use Shopware\Plugins\DsnRecommendation\Components\CsvExporter;
use Shopware\Plugins\DsnRecommendation\Components\DemoData\Customer;
use Shopware\Plugins\DsnRecommendation\Components\DemoData\DemoData;
use Shopware\Plugins\DsnRecommendation\Components\DemoData\Items;
use Shopware\Plugins\DsnRecommendation\Components\DemoData\Order;
use Shopware\Plugins\DsnRecommendation\Components\Neo\BulkExporter;
use Shopware\Plugins\DsnRecommendation\Components\Neo\ClientFactory;
use Shopware\Plugins\DsnRecommendation\Components\Neo\SyncOrder;
use Symfony\Component\DependencyInjection\Container as DIC;

/**
 * Class Container represents the DsnRecommendation DI container extensions
 * @package Shopware\Plugins\DsnRecommendation\Subscriber
 */
class Container extends LazySubscriber
{
    public static function define()
    {
        return [
            'dsn_recommendation.sync_service' => function(DIC $dic) {
                return new SyncOrder(
                    $dic->get('dsn_recommendation.neo_client')
                );
            },
            'dsn_recommendation.demo' => function () {
                /** @var $article Article */
                $article = Manager::getResource('article');
                /** @var $customer \Shopware\Components\Api\Resource\Customer */
                $customer = Manager::getResource('customer');

                return new DemoData(
                    new Items($article),
                    new Customer($customer),
                    new Order()
                );
            },
            'dsn_recommendation.bulk_exporter' => function (DIC $dic) {
                return new BulkExporter(
                    $dic->get('dsn_recommendation.neo_client'),
                    $dic->get('dsn_recommendation.csv_export')
                );
            },
            'dsn_recommendation.neo_client' => function (DIC $dic) {
                return $dic->get('dsn_recommendation.client_factory')->factory();
            },
            'dsn_recommendation.client_factory' => function () {
                return new ClientFactory();
            },
            'dsn_recommendation.csv_export' => function (DIC $dic) {
                return new CsvExporter($dic->get('dbal_connection'));
            }
        ];
    }
}
