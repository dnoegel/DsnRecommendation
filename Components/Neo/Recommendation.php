<?php

namespace DsnRecommendation\Components\Neo;

use Everyman\Neo4j\Cypher\Query;

class Recommendation
{
    /**
     * @var \Everyman\Neo4j\Client
     */
    private $client;

    public function __construct(\Everyman\Neo4j\Client $client)
    {
        $this->client = $client;
    }

    public function recommend($itemId)
    {
        $template = <<<EOD
            MATCH (originalItem:Item {itemId: {itemId}})<-[:purchased]-(otherCustomer:Customer)-[:purchased]->(alsoBought:Item)
            WHERE alsoBought <> originalItem
            RETURN alsoBought.itemId, count(alsoBought) as frequency
            ORDER BY frequency DESC
            LIMIT 10
EOD;


        $query = new Query($this->client, $template, ['itemId' => (string)$itemId]);

        $result = [];
        foreach ($query->getResultSet() as $row) {
            $result[$row['itemId']] = $row['frequency'];
        }

        return $result;

    }
}