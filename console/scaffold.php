<?php
require __DIR__ . '/CreateDatabaseCommand.php';
require __DIR__ . '/CreateScriptCommand.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';
use \Symfony\Component\Console\Application;

class Temp {
    /** @Column(type="integer") */
    public $id;
}

$t = new Temp();
echo $t->id->__get("Column");
/*
\Maestro\Manager::init();

$application = new Application();
$application->add(new CreateDatabaseCommand());
$application->add(new CreateScriptCommand());
$application->run();
*/