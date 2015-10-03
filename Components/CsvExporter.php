<?php

namespace Shopware\Plugins\DsnRecommendation\Components;

use Doctrine\DBAL\Connection;

class CsvExporter
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Will export all orders to a (random) csv file
     * @return string
     */
    public function export()
    {
        return $this->createCsv(
            $this->getOrderData()
        );
    }

    /**
     * Read all required fields from the order table.
     * Warning: The current implementation is quite naive, everything is read in one query
     * @return array
     */
    private function getOrderData()
    {
        $data = $this->connection->fetchAll('
            SELECT name, articleID, sob.userID, CONCAT(firstname, " ", lastname) as userName

            FROM s_order_details sod

            INNER JOIN s_order_billingaddress sob
              on sob.orderID = sod.orderID

          WHERE articleID != 0
        ');
        return $data;
    }

    /**
     * Write the passed order $data to a random CSV file
     * @param $data
     * @return string
     */
    private function createCsv($data)
    {
        $csvName = \Shopware\Components\Random::getAlphanumericString(20) . '.csv';
        $relativePath = 'files/' . $csvName;
        $path = Shopware()->DocPath() . $relativePath;
        $fp = fopen($path, 'w');

        if (!$fp) {
            throw new \RuntimeException("Could not create $path");
        }

        fputcsv($fp, ["item", "itemId", "userId", "userName"]);
        foreach ($data as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);

        /** @var \Shopware\Models\Shop\Repository $repo */
        $repo = Shopware()->Models()->getRepository('Shopware\Models\Shop\Shop');
        $shop =$repo->getActiveDefault();

        return
        [
            'http://' . $shop->getHost() . '/' . $shop->getBasePath() . '/' . $relativePath,
            $path
        ];
    }
}
