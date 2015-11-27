<?php
require dirname(__DIR__) . '/vendor/autoload.php';
\Maestro\Manager::init();

function get_driver($scheme){
    switch ($scheme){
        case "postgresql":
            return 'pdo_pgsql';
        case "mysql":
            return 'pdo_mysql';
        default:
            return '';
    }
}
use Ulrichsg\Getopt\Getopt;
use Ulrichsg\Getopt\Option;

//postgresql://scott:tiger@localhost:5432/mydatabase
$getopt = new Getopt(array(
    new Option('s', 'script', Getopt::REQUIRED_ARGUMENT),
    new Option('u', 'url', Getopt::REQUIRED_ARGUMENT),
    new Option('o', 'outdir',Getopt::OPTIONAL_ARGUMENT)
));
$getopt->parse();

$url = parse_url($getopt['url']);
$conf = [
    'driver' => get_driver($url['scheme']),
    'host' => $url['host'],
    'dbname' => substr($url['path'],1),
    'user' => $url['user'],
    'password' => $url['pass'],
    'charset' => 'UTF8',
];
\Maestro\Manager::setConf('db.generator', $conf);
$mdb = new \Maestro\Database\MDatabase("generator");
$conn = $mdb->getConnection();
echo get_class($conn);