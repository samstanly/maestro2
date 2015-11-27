<?php
require_once dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';

use \Symfony\Component\Console\Application;
require __DIR__ . '/CreateUserCommand.php';
require __DIR__ . '/RetrieveUserCommand.php';

\Maestro\Manager::init();

$application = new Application();
$application->add(new CreateUserCommand());
$application->add(new RetrieveUserCommand());
$application->run();
