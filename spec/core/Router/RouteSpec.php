<?php

namespace spec\Core\Router;

use Core\Router;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RouteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Router\Route');
    }

    function it_can_set_GET_POST_PUT_DELETE_methods(){
        $methods = array("GET", "POST", "PUT", "DELETE", "PATCH");
        foreach ($methods as $method) {
            $this->setMethod($method);
            $this->getMethod()->shouldReturn($method);
        }
    }

    function it_should_throw_an_excpetion_when_trying_to_add_a_wrong_method(){
        $this->shouldThrow('\InvalidArgumentException')->duringSetMethod("INVALID");
    }

}