<?php

namespace DsnRecommendation\Components\Neo;

/**
 * Class ClientFactory will create the neo4j client object
 * @package DsnRecommendation\Components\Neo
 */
class ClientFactory
{
    public function factory()
    {
        $host = Shopware()->Container()->getParameterBag()->get('shopware.neo4j.host');
        $port = Shopware()->Container()->getParameterBag()->get('shopware.neo4j.port') ?: 7474;
        $user = Shopware()->Container()->getParameterBag()->get('shopware.neo4j.user');
        $pass = Shopware()->Container()->getParameterBag()->get('shopware.neo4j.pass');

        $client = new \Everyman\Neo4j\Client($host, $port);
        $client->getTransport()
            ->setAuth($user, $pass);
        return $client;
    }
}
