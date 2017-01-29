<?php

namespace DsnRecommendation\Commands;

use Shopware\Components\Model\ModelManager;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Shopware\Commands\ShopwareCommand;

/**
 * Class Recommendation will export local Shopware orders to neo4j
 * @package DsnRecommendation\Commands
 */
class Recommendation extends ShopwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('dsn:neo4j:export')
            ->setDescription('Export orders to neo4j database')
            ->setHelp(<<<EOF
The <info>%command.name%</info> will export your local orders to the neo4j graph database.
EOF
            );
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->container->get('dsn_recommendation.bulk_exporter')->run();
    }
}
