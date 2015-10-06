<?php

namespace Shopware\Plugins\DsnRecommendation\Subscriber;

class Order implements \Enlight\Event\SubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            'Shopware_Modules_Order_SaveOrder_ProcessDetails' => 'onSaveOrder'
        );
    }

    public function onSaveOrder(\Enlight_Event_EventArgs $args)
    {
        /** @var \sOrder $order */
        $order = $args->get('subject');
        $details = $args->get('details');
        $userData = $order->sUserData;

        $userName = $userData['billingaddress']['firstname'] . ' ' . $userData['billingaddress']['lastname'];
        $userId = $userData['billingaddress']['userID'];
        $items = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['articlename']
            ];
        }, array_filter($details, function ($item) {
            return $item['modus'] == 0;
        }));

        Shopware()->Container()->get('dsn_recommendation.sync_service')->sync($userId, $userName, $items);
    }
}
