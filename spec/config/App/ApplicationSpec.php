<?php
namespace spec\Config\App;
define('PROJECT_ROOT', realpath(__DIR__ . '/../../..'));
require PROJECT_ROOT . '/config/start.php';


use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

$_SERVER["REQUEST_METHOD"] = "GET";
$_SERVER["REMOTE_ADDR"] = "localhost";
$_SERVER["REQUEST_URI"] = "/";
$_SERVER["SERVER_NAME"] = "localhost";
$_SERVER["SERVER_PORT"] = "80";

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Config\App\Application');
    }

    function it_is_initialize_with_development_env_by_default()
    {

        $this->getEnv()->shouldReturn("development");
    }

    function it_allows_to_set_get_method_for_any_specified_path(){
        $this->get("/", function(){
            echo "I pass!";
        });
        $this->start()->shouldReturn("I pass!");
    }

}