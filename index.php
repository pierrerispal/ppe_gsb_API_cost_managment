<?php
//INIT
require 'vendor/autoload.php';
require 'api_function.php';
use RedBeanPHP\Facade as R;
R::setup( 'mysql:host=localhost','root', 'pwsio' );
$app = new \Slim\Slim();

//ROUTES
require 'routes.php';

//EXECUTION
$app->run();