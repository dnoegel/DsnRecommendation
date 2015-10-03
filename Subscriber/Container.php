<?php

namespace Shopware\Plugins\DsnRecommendation\Subscriber;

use Dnoegel\LazySubscriber\LazySubscriber;
use Shopware\Plugins\DsnRecommendation\Components\CsvExporter;
use Shopware\Plugins\DsnRecommendation\Components\Neo\BulkExporter;
use Shopware\Plugins\DsnRecommendation\Components\Neo\ClientFactory;
use Symfony\Component\DependencyInjection\Container as DIC;

class Container extends LazySubscriber
{
    public static function define()
    {
        return [
            'dsn_recommendation.bulk_exporter' => function(DIC $dic) {
                return new BulkExporter(
                    $dic->get('dsn_recommendation.neo_client'),
                    $dic->get('dsn_recommendation.csv_export')
                );
            },
            'dsn_recommendation.neo_client' => function (DIC $dic) {
                return $dic->get('dsn_recommendation.client_factory')->factory();
            },
            'dsn_recommendation.client_factory' => function() {
                return new ClientFactory();
            },
            'dsn_recommendation.csv_export' => function(DIC $dic) {
                return new CsvExporter($dic->get('dbal_connection'));
            }
        ];
    }
}