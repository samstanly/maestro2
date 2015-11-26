<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
use Maestro\Manager;
use \Symfony\Component\Console\Command\Command;
use \Symfony\Component\Console\Input\InputArgument;
use \Symfony\Component\Console\Input\InputInterface;
//use \Symfony\Component\Console\Input\InputOption;
use \Symfony\Component\Console\Output\OutputInterface;

class DatabaseCreateCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('database')
            ->setDescription('Generate database')
            ->addArgument(
                'app',
                InputArgument::OPTIONAL,
                'From App maps'
            )
            ->addArgument(
                'script',
                InputArgument::OPTIONAL,
                'From INI script'
            )
            /*
            ->addOption(
                'yell',
                null,
                InputOption::VALUE_NONE,
                'If set, the task will yell in uppercase letters'
            )*/
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $app = $input->getArgument('app');
        /*
        $scriptFile = $input->getArgument('script');
        if ($scriptFile) {

        } else {
            $text = 'Hello';
        }
        */

        $ns = "{$app}\\models\\map";
        require Manager::getAppPath('','',$app) . '/vendor/autoload.php';
        Manager::execute("{$app}/api/main/main");
        $files = [];
        \Maestro\Utils\MUtil::dirToArray(Manager::getAppPath('','',$app) . '/models/map',$files);
        foreach($files as $file){
            $className = substr(basename($file),0,-4);
            $classFullName = "\\{$app}\\models\\map\\{$className}";
            if(class_exists($classFullName)){
                $map = new $classFullName();
                $ormmap = $map->ORMMap();
                mdump($ormmap);
            }
        }
        //$a = new Role();
        //$output->writeln();
    }
}