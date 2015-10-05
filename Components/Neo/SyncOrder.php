<?php

namespace Shopware\Plugins\DsnRecommendation\Components\Neo;

use Everyman\Neo4j\Cypher\Query;

class SyncOrder
{
    /**
     * @var \Everyman\Neo4j\Client
     */
    private $client;

    public function __construct(\Everyman\Neo4j\Client $client)
    {
        $this->client = $client;
    }

    public function sync($userId, $userName, $items)
    {
        $merges = '';
        foreach ($items as $item) {
            $merges .= "\nMERGE (item:Item { itemId:'{$item['id']}', name:'{$item['name']}' })";
        }

        $query = <<<EOF
MERGE (customer:Customer { userId: '$userId', name:'$userName'})
$merges
CREATE UNIQUE (customer)-[:purchased]->(item);
EOF;

        $query = new Query($this->client, $query);
        $query->getResultSet();

    }
}