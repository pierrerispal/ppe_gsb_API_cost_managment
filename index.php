<?php
//INIT
require 'vendor/autoload.php';
//require 'HttpBasicAuth.php';
\Slim\Slim::registerAutoloader();
require 'api_function.php';
use RedBeanPHP\Facade as R;
R::setup( 'mysql:host=localhost','root', 'pwsio' );
$app = new \Slim\Slim();
//$app->add(new \HttpBasicAuth());
//ROUTES
require 'routes.php';

//READ
//EXECUTION
$app->run();