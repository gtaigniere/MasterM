<?php

session_start();

require_once 'config' . DIRECTORY_SEPARATOR . 'config.php';
require_once 'config' . DIRECTORY_SEPARATOR . 'Autoloader.php';

use Config\Autoloader;
use Router\Router;

Autoloader::register();
$router = new Router($_GET);
$router->route();
