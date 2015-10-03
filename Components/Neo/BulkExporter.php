<?php

namespace Shopware\Plugins\DsnRecommendation\Components\Neo;

use Everyman\Neo4j\Cypher\Query;
use Shopware\Plugins\DsnRecommendation\Components\CsvExporter;

/**
 * Class BulkExporter is responsible for running the correct queries, to export the Shopware order CSV
 * to neo4j
 * @package Shopware\Plugins\DsnRecommendation\Components\Neo
 */
class BulkExporter
{
    /**
     * @var \Everyman\Neo4j\Client
     */
    private $client;
    /**
     * @var CsvExporter
     */
    private $csvExporter;

    public function __construct(\Everyman\Neo4j\Client $client, CsvExporter $csvExporter)
    {
        $this->client = $client;
        $this->csvExporter = $csvExporter;
    }

    public function run()
    {
        list($url, $path) = $this->csvExporter->export();
        $query = <<<EOD
USING PERIODIC COMMIT

LOAD CSV WITH HEADERS FROM "$url" AS row
MERGE (customer:Customer { id: row.userId, name:row.userName})
MERGE (item:Item { id:row.itemId, name:row.item })
CREATE UNIQUE (customer)-[:purchased]->(item);
EOD;

        $query = new Query($this->client, $query);
        $query->getResultSet();

        unlink($path);
    }
}
