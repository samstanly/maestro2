<?php

/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 24/11/2015
 * Time: 10:51
 */
use Maestro\Manager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RetrieveUserCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('user:retrieve')
            ->setDescription('Retrieve user')
            ->addArgument(
                'login',
                InputArgument::REQUIRED,
                'Login'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = "auth/api/main/retrieveUser";
        $param = ["login"=>$input->getArgument('login')];
        $result = Manager::execute($url,$param);
        $output->writeln($result);
    }
}