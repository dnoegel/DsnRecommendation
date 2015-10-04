<?php

namespace Shopware\Plugins\DsnRecommendation\Components\DemoData;

use Doctrine\DBAL\Connection;
use Shopware\Components\Random;

/**
 * Class Order will create demo orders. Be aware, that the orders created by
 * this script just meant for neo4j export - so you will probably not be able
 * to open them in the Shopware backend
 * @package Shopware\Plugins\DsnRecommendation\Components\DemoData
 */
class Order
{
    private $orders = [
        [
            'user' => 'wurstfinger@example.org',
            'items' => [
                'demo5', 'demo6', 'demo7', 'demo1', 'demo2'
            ]
        ], [
            'user' => 'jellyfish@example.org',
            'items' => [
                'demo5', 'demo6', 'demo7'
            ]
        ], [
            'user' => 'johanson@example.org',
            'items' => [
                'demo5', 'demo6', 'demo1', 'demo2'
            ]
        ], [
            'user' => 'mastercard@example.org',
            'items' => [
                'demo8', 'demo9', 'demo10'
            ]
        ], [
            'user' => 'snow@example.org',
            'items' => [
                'demo12', 'demo13', 'demo14'
            ]
        ], [
            'user' => 'glowfish@example.org',
            'items' => [
                'demo8', 'demo9', 'demo10', 'demo12', 'demo13', 'demo14'
            ]
        ], [
            'user' => 'frechmann@example.org',
            'items' => [
                'demo18', 'demo20'
            ]
        ], [
            'user' => 'mueller@example.org',
            'items' => [
                'demo18', 'demo20', 'demo22'
            ]
        ], [
            'user' => 'knickrig@example.org',
            'items' => [
                'demo18', 'demo20', 'demo22', 'demo21'
            ]
        ],
    ];

    public function create()
    {
        $this->deleteDemoOrders();

        /*
         * Wrap all this into an transaction, as the code below
         * will create orders and details in a loop.
         */
        Shopware()->Db()->beginTransaction();
        foreach ($this->orders as $order) {
            $this->createOrderFromArray($order);
        }
        Shopware()->Db()->commit();
    }

    private function createOrderFromArray($orderInfo)
    {
        echo "Creating order for " . $orderInfo['user'] . "\n";

        $userId = $this->getUserId($orderInfo);
        $number = Shopware()->Modules()->Order()->sGetOrderNumber();

        $orderId = $this->createOrder($number, $userId);
        $this->createOrderDetails($orderInfo, $orderId, $number);
        $this->createOrderBillingAddress($orderId, $userId);
    }

    private function createOrderBillingAddress($orderId, $userId)
    {
        $data = Shopware()->Db()->fetchRow('SELECT * FROM s_user_billingaddress WHERE userID = ?', [$userId]);
        $data['orderID'] = $orderId;
        unset($data['birthday']);
        Shopware()->Db()->insert(
            's_order_billingaddress',
            $data
        );
    }

    /**
     * Delete all demo data orders
     *
     * @throws \Zend_Db_Adapter_Exception
     */
    private function deleteDemoOrders()
    {
        Shopware()->Db()->exec(
            'DELETE o, d
            FROM s_order o
            INNER JOIN s_order_details d
            ON d.orderID = o.id
            WHERE o.transactionID = "recommendation_demo"
        ');

    }

    /**
     * @param $number
     * @param $userId
     * @return string
     * @throws \Zend_Db_Adapter_Exception
     */
    private function createOrder($number, $userId)
    {
        Shopware()->Db()->insert('s_order', [
            'ordernumber' => $number,
            'userID' => $userId,
            'invoice_amount' => 333,
            'invoice_amount_net' => 222,
            'invoice_shipping' => 10,
            'invoice_shipping_net' => 0,
            'status' => 0,
            'cleared' => 17,
            'paymentID' => 2,
            'language' => 1,
            'dispatchID' => 9,
            'currency' => 'EUR',
            'currencyFactor' => 1,
            'subShopID' => 1,
            'transactionID' => 'recommendation_demo'
        ]);
        $orderId = Shopware()->Db()->lastInsertId();
        return $orderId;
    }

    /**
     * @param $orderInfo
     * @param $orderId
     * @param $number
     * @throws \Zend_Db_Adapter_Exception
     */
    private function createOrderDetails($orderInfo, $orderId, $number)
    {
        $stmt = Shopware()->Models()->getConnection()->createQueryBuilder()
            ->select(['d.ordernumber as articleordernumber', 'd.articleID', 'a.name'])
            ->from('s_articles_details', 'd')
            ->leftJoin('d', 's_articles', 'a', 'a.id = d.articleID')
            ->where('d.ordernumber IN (:numbers)')
            ->setParameter('numbers', $orderInfo['items'], Connection::PARAM_STR_ARRAY)
            ->execute();
        $itemInfos = $stmt->fetchAll();

        foreach ($itemInfos as $info) {
            $info['orderID'] = $orderId;
            $info['ordernumber'] = $number;
            $info['price'] = 333;
            $info['quantity'] = 1;
            $info['modus'] = 0;
            $info['taxID'] = 0;
            $info['tax_rate'] = 19;
            Shopware()->Db()->insert('s_order_details', $info);
        }
    }

    /**
     * @param $orderInfo
     * @return string
     */
    private function getUserId($orderInfo)
    {
        $userId = Shopware()->Db()->fetchOne('SELECT id FROM s_user WHERE email = ?', [$orderInfo['user']]);
        return $userId;
    }
}
