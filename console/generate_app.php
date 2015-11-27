<?php
require dirname(__DIR__) . '/vendor/autoload.php';
use Ulrichsg\Getopt\Getopt;
use Ulrichsg\Getopt\Option;


$getopt = new Getopt(array(
    new Option('s', 'script', Getopt::REQUIRED_ARGUMENT),
    new Option('d', 'database', Getopt::REQUIRED_ARGUMENT),
    new Option('o', 'outdir',Getopt::OPTIONAL_ARGUMENT)
));
$getopt->parse();

$script = file_get_contents($getopt['script']);
$script = str_replace('$database', $getopt['database'],$script);

$tempFile = __DIR__ .'/temp_script.txt';
file_put_contents($tempFile, $script);

$result = \Maestro\Manager::execute('wizard/api/main/generateApp',array("file"=> $tempFile,"base"=>$getopt['outdir']));
echo  $result . PHP_EOL;

unlink($tempFile);