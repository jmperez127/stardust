<?php
use Config\App\Application as App;

define('PROJECT_ROOT', realpath(__DIR__ . '/..'));
require PROJECT_ROOT . '/config/start.php';

$app = App::setup("development");
$app->start();