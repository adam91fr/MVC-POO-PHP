<?php

use App\Autoloader;
use App\Core\Main;

define('ROOT', dirname(__DIR__));
//echo 'ROOT : '.ROOT.' ';

require_once ROOT.'/Autoloader.php';
Autoloader::register();

// routeur
$app=new Main();

$app->start();


?>
