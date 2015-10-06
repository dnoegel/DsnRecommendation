<?php

namespace Shopware\Plugins\DsnRecommendation\Subscriber;

class Recommendation implements \Enlight\Event\SubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            'Enlight_Controller_Action_PostDispatchSecure_Frontend_Detail' => 'onPostDispatchDetail'
        );
    }

    public function onPostDispatchDetail(\Enlight_Event_EventArgs $args)
    {
        /** @var \Enlight_View $view */
        $view = $args->get('subject')->View();
        $itemId = $view->getAssign('sArticle')['articleID'];

        $view->addTemplateDir(
            __DIR__ . '/../Views'
        );

        $result = $this->getRecommendationItems($itemId);

        if (!$result) {
            return;
        }
        $view->assign('dsnHasRecommendations', $result);
    }

    /**
     * @param $itemId
     * @return array
     * @throws \Exception
     */
    private function getRecommendationItems($itemId)
    {
        /** @var \Shopware\Plugins\DsnRecommendation\Components\Neo\Recommendation $recommendationService */
        $recommendationService = Shopware()->Container()->get('dsn_recommendation.recommendation');
        $recommendations = $recommendationService->recommend($itemId);

        $result = [];
        foreach ($recommendations as $recommendation => $frequency) {
            if ($promotion = Shopware()->Modules()->Articles()->sGetPromotionById('fix', 0, $recommendation)) {
                $result[] = $promotion;
            }
        }
        return $result;
    }
}
