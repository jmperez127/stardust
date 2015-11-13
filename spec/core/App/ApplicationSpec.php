<?php
namespace spec\Core\App;
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
        $this->shouldHaveType('Core\App\Application');
    }

    function it_is_initialized_with_development_env_by_default()
    {
        $this->getEnv()->shouldReturn("development");
    }
}
