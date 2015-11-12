<?php
use Config\App\Application as App;

define('PROJECT_ROOT', realpath(__DIR__ . '/..'));
require PROJECT_ROOT . '/config/start.php';

$app = new App("development");
$app->get("/", function () {
    echo "Hello World!";
})->start();