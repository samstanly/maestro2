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

class CreateUserCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('user:create')
            ->setDescription('Create new user')
            ->addArgument(
                'login',
                InputArgument::REQUIRED,
                'Login'
            )
            ->addArgument(
                'password',
                InputArgument::REQUIRED,
                'Password'
            )
            ->addArgument(
                'email',
                InputArgument::OPTIONAL,
                'Email'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = "auth/api/main/createUser";
        $param = ["login"=>$input->getArgument('login'),"password"=>$input->getArgument('password'),
            "email"=>$input->getArgument('email')];
        $result = Manager::execute($url,$param);
        $output->writeln($result);
    }
}