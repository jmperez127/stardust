<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('PROJECT_ROOT', realpath(__DIR__ . '/..'));
require PROJECT_ROOT . '/config/application.php';

$app = \application\Application::setup();
$app->start();