<?php

define('PROJECT_ROOT', realpath(__DIR__ . '/..'));
require PROJECT_ROOT . '/config/start.php';

use Core\App\Application as App;
use Core\Router\Router;

$test = new Router();

class controller extends \Core\Controller\BaseController{

}

$app = new App("development");
$app->get("/", function () {
    echo "Hello World!";
})->start();