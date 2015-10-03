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

    public function export()
    {
        $csvPath = $this->createCsv(
            $this->getOrderData()
        );

        return $csvPath;
    }

    /**
     * @return array
     */
    protected function getOrderData()
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
     * @param $data
     * @return string
     */
    protected function createCsv($data)
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