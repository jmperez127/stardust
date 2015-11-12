<?php
namespace Config\App;
use Slim\Slim;


class Application
{
    const ENV_DEVELOPMENT = 'development';

    protected $enviroment;
    private $app;

    public function __construct($env = "development")
    {
        $this->app = new Slim();
        $this->app->env = $this->enviroment = $env;
    }

    public function getEnv(){
        return $this->enviroment;
    }

    public function get($path, $action){
        $this->app->get($path, $action);
        return $this;
    }

    public function start()
    {
        if ($this->enviroment == self::ENV_DEVELOPMENT) {
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
        }

        $this->app->run();
    }
}