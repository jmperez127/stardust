<?php
namespace Core\App;

use Slim\Slim;


class Application {
    const ENV_DEVELOPMENT = 'development';
    protected static $root_path;
    protected static $controllers_path;
    protected static $app_path;

    protected $environment;
    private $app;

    public function __construct($env = "development") {
        $this->app = new Slim();
        $this->app->env = $this->environment = $env;
    }

    public function getEnv() {
        return $this->environment;
    }

    public function get($path, $action) {
        $this->app->get($path, $action);
        return $this;
    }

    public function start() {
        if ($this->environment == self::ENV_DEVELOPMENT) {
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
        }

        $this->app->run();
    }
   // TODO: load this methods and paths dynamically with a config file, likely named directory mapper
    public static function getRootPath() {
        if (!isset(self::$root_path)) self::$root_path = realpath(__DIR__ . "/../..");
        return self::$root_path;
    }

    public static function setRootPath($path) {
        self::$root_path = $path;
    }

    public static function getControllersPath() {
        if (!isset(self::$controllers_path)) self::$controllers_path = realpath(self::getAppPath() . "/controllers");
        return self::$controllers_path;
    }

    public static function setControllersPath($path) {
        self::$controllers_path = $path;
    }

    public static function getAppPath() {
        if (!isset(self::$app_path)) self::$app_path = realpath(self::getRootPath() . "/app");
        return self::$app_path;
    }

    public static function setAppPath($path) {
        self::$app_path = $path;
    }
}