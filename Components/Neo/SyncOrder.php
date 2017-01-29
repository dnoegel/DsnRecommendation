<?php

namespace DsnRecommendation\Components\Neo;

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

    /**
     * Will sync the ordered items for the given user to neo4j.
     * The cypher query is created manually here, as the used neo4j library
     * does not seem to support creating MERGE queries in the batch mode.
     * Generally using the batch mode might be more elegant.
     *
     * @param $userId
     * @param $userName
     * @param $items
     */
    public function sync($userId, $userName, $items)
    {
        $params = [
            'userId' => (string)$userId,
            'userName' => $userName
        ];

        $merges = '';
        $creates = '';
        /**
         * will create create the items / relations in neo4j
         * this will basically build the MERGE and CREATE UNIQUE statements
         * for every item in the basket
         */
        foreach ($items as $key => $item) {
            $params['item' . $key . '_name'] = $item['name'];
            $params['item' . $key . '_id'] = $item['id'];

            $merges .= "\nMERGE (item{$key}:Item { itemId:{item{$key}_id}, name:{item{$key}_name} })";
            $creates .= "\nCREATE UNIQUE (customer)-[:purchased]->(item{$key})";
        }

        $query = "MERGE (customer:Customer { userId: {userId}, name:{userName}}) {$merges} {$creates};";

        $query = new Query($this->client, $query, $params);
        $query->getResultSet();

    }
}