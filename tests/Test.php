<?php

class PluginTest extends Shopware\Components\Test\Plugin\TestCase
{
    protected static $ensureLoadedPlugins = array(
        'DsnRecommendation' => array(
        )
    );

    public function setUp()
    {
        parent::setUp();

        $helper = \TestHelper::Instance();
        $loader = $helper->Loader();


        $pluginDir = getcwd() . '/../';

        $loader->registerNamespace(
            'Shopware\\DsnRecommendation',
            $pluginDir
        );
    }

    public function testCanCreateInstance()
    {
        /** @var Shopware_Plugins_Core_DsnRecommendation_Bootstrap $plugin */
        $plugin = Shopware()->Plugins()->Core()->DsnRecommendation();

        $this->assertInstanceOf('Shopware_Plugins_Core_DsnRecommendation_Bootstrap', $plugin);
    }
}
