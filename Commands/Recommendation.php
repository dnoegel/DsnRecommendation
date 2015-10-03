<?php

namespace Shopware\Plugins\DsnRecommendation\Commands;

use Shopware\Components\Model\ModelManager;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Shopware\Commands\ShopwareCommand;

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
            ->addOption(
                'host',
                null,
                InputOption::VALUE_OPTIONAL,
                'neo4j database host',
                null
            )->addOption(
                'port',
                null,
                InputOption::VALUE_OPTIONAL,
                'neo4j database port',
                '7474'
            )->addOption(
                'user',
                null,
                InputOption::VALUE_OPTIONAL,
                'neo4j username',
                null
            )->addOption(
                'pass',
                null,
                InputOption::VALUE_OPTIONAL,
                'neo4j password',
                null
            )
            ->setHelp(<<<EOF
The <info>%command.name%</info> implements a command.
EOF
            );
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->prepareOptions($input);

        $this->container->get('dsn_recommendation.bulk_exporter')->run();

    }

    /**
     * Will read cli options and temporarily overwrite the global shopware config
     *
     * @param InputInterface $input
     */
    protected function prepareOptions(InputInterface $input)
    {
        foreach (['host', 'user', 'port', 'pass'] as $key) {
            if ($input->getOption($key)) {
                Shopware()->Config()->offsetSet('DsnRecommendation::' . $key, $input->getOption($key));
            }
        }
    }
}