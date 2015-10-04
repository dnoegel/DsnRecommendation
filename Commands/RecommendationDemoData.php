<?php

namespace Shopware\Plugins\DsnRecommendation\Commands;

use Shopware\Components\Model\ModelManager;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Shopware\Commands\ShopwareCommand;

/**
 * Class RecommendationDemoData will create recommendation demo data
 * @package Shopware\Plugins\DsnRecommendation\Commands
 */
class RecommendationDemoData extends ShopwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('dsn:recommendation:demo')
            ->setDescription('Create some demo data')
            ->setHelp(<<<EOF
The <info>%command.name%</info> will create some demo data for the reco engine.
EOF
            );
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // disable notices for this command - seems to come from the ORM
        error_reporting(E_ALL & ~E_NOTICE & ~ E_WARNING);
        $this->container->get('dsn_recommendation.demo')->create();
    }
}
