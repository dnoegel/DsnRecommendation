<?php

namespace Shopware\Plugins\DsnRecommendation\Components\Neo;

/**
 * Class ClientFactory will create the neo4j client object
 * @package Shopware\Plugins\DsnRecommendation\Components\Neo
 */
class ClientFactory
{
    public function factory()
    {
        $host = Shopware()->Config()->getByNamespace('DsnRecommendation', 'host');
        $port = Shopware()->Config()->getByNamespace('DsnRecommendation', 'port');
        $user = Shopware()->Config()->getByNamespace('DsnRecommendation', 'user');
        $pass = Shopware()->Config()->getByNamespace('DsnRecommendation', 'pass');

        $client = new \Everyman\Neo4j\Client($host, $port);
        $client->getTransport()
            ->setAuth($user, $pass);
        return $client;
    }
}
