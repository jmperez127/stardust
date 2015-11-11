<?php

namespace spec;
use application;
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
