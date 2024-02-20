<?php

use Router\Router;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS' , dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);

$url = $_GET['url'] ?? '/';

$router = new Router($url);

$router->get('/', 'App\Controllers\ConnexionController@index');


$router->run();
