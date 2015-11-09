<?php
namespace application;
if (!defined('PROJECT_ROOT'))
    define('PROJECT_ROOT', realpath(__DIR__ . '/..'));

require PROJECT_ROOT . '/vendor/autoload.php';
use Slim\Slim;


class Application
{
    const ENV_DEVELOPMENT = 'development';

    protected $enviroment;
    private $app;

    private function __construct($env)
    {
        $this->app = new Slim;
        $this->app->env = $this->enviroment = $env;
    }

    public static function setup($env = self::ENV_DEVELOPMENT)
    {
        $application = new Application($env);
        return $application;
    }

    public function start()
    {
        if ($this->enviroment == self::ENV_DEVELOPMENT) {
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
        }

        $this->app->get('/', function () {
            echo 'Home Page';
        });
        $this->app->run();
    }
}