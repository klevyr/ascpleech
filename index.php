<?php
/**
* @package Anthor
*/

error_reporting(E_ALL);
ini_set('display_errors','On');

/**
* Autoload test fixtures
*/
$autoload = require dirname(__FILE__) . '/vendor/autoload.php';
require dirname(__FILE__) . '/app/helpers/SpotHelper.php';
// Date setup
date_default_timezone_set('America/Guayaquil');
// Create Router instance
$router = new \Bramus\Router\Router();
// Before Router Middleware
$router->before('GET', '/.*', function () { header('X-Powered-By: bramus/router'); });
// Routers
$router->get('/index.php/leech/', '\Portabilidad\Controllers\PortabilidadController@syncCelular');
// EndRouters
$router->run();
