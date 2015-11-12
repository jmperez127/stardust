<?php
/**
 * Created by PhpStorm.
 * User: JM
 * Date: 11/12/2015
 * Time: 3:03 AM
 */

namespace spec\Config\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application');
    }

    function it_can_be_initialized_with_an_env_variable()
    {
        $app = $this->setup("env");
        $this->equalTo($app->enviroment, "env", "env");
    }
}