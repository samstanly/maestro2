<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
use Maestro\Manager;
use \Symfony\Component\Console\Command\Command;
use \Symfony\Component\Console\Input\InputArgument;
use \Symfony\Component\Console\Input\InputInterface;
//use \Symfony\Component\Console\Input\InputOption;
use \Symfony\Component\Console\Output\OutputInterface;

class CreateScriptCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('script')
            ->setDescription('Generate INI script')
            ->addArgument(
                'url',
                InputArgument::REQUIRED,
                'Database url'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');
        echo Manager::execute("wizard/api/main/generateScript",["dbURL"=>$url]);
    }
}