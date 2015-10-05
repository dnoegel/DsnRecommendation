<?php

/**
 * The Bootstrap class is the main entry point of any shopware plugin.
 *
 * Short function reference
 * - install: Called a single time during (re)installation. Here you can trigger install-time actions like
 *   - creating the menu
 *   - creating attributes
 *   - creating database tables
 *   You need to return "true" or array('success' => true, 'invalidateCache' => array()) in order to let the installation
 *   be successfull
 *
 * - update: Triggered when the user updates the plugin. You will get passes the former version of the plugin as param
 *   In order to let the update be successful, return "true"
 *
 * - uninstall: Triggered when the plugin is reinstalled or uninstalled. Clean up your tables here.
 */
class Shopware_Plugins_Core_DsnRecommendation_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    public function getVersion()
    {
        $info = json_decode(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR .'plugin.json'), true);
        if ($info) {
            return $info['currentVersion'];
        } else {
            throw new Exception('The plugin has an invalid version file.');
        }
    }

    public function getLabel()
    {
        return 'DsnRecommendation';
    }

    public function uninstall()
    {
        return true;
    }

    public function update($oldVersion)
    {
        return true;
    }

    public function install()
    {
        if (!$this->assertVersionGreaterThen('4.3.0')) {
            throw new \RuntimeException('At least Shopware 4.3.0 is required');
        }


        $this->subscribeEvent(
            'Enlight_Controller_Front_DispatchLoopStartup',
            'onStartDispatch'
        );


        $this->subscribeEvent(
            'Shopware_Console_Add_Command',
            'onAddConsoleCommand'
        );
        return true;
    }

    /**
     * Callback function of the console event subscriber. Register your console commands here.
     */
    public function onAddConsoleCommand(Enlight_Event_EventArgs $args)
    {
        $this->registerMyComponents();

        // You can easily add more commands here
        return new \Doctrine\Common\Collections\ArrayCollection(array(
            new \Shopware\Plugins\DsnRecommendation\Commands\Recommendation(),
            new \Shopware\Plugins\DsnRecommendation\Commands\RecommendationDemoData(),
        ));
    }

    /**
     * This callback function is triggered at the very beginning of the dispatch process and allows
     * us to register additional events on the fly. This way you won't ever need to reinstall you
     * plugin for new events - any event and hook can simply be registerend in the event subscribers
     */
    public function onStartDispatch(Enlight_Event_EventArgs $args)
    {
        $this->registerMyComponents();
                

        $subscribers = array(
            new \Shopware\Plugins\DsnRecommendation\Subscriber\Order()
        );

        foreach ($subscribers as $subscriber) {
            $this->Application()->Events()->addSubscriber($subscriber);
        }
    }

    public function registerMyComponents()
    {
        $this->registerAutoloader();

        $this->Application()->Events()->addSubscriber(
            new \Shopware\Plugins\DsnRecommendation\Subscriber\Container(Shopware()->Container())
        );
    }

    /**
     * require the composer autoloader
     */
    private function registerAutoloader()
    {
        require_once __DIR__ . '/vendor/autoload.php';
    }
}
