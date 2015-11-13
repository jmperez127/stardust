<?php

namespace spec\Core\Router;

use Core\Router\Route;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RouterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Router\Router');
    }

    function it_holds_an_array_of_routes(){
        $this->getRoutes()->shouldHaveCount(0);
    }

    function it_allow_new_routes_to_be_added(){
        $route = new Route();
        $this->addRoute($route);
        $this->getRoutes()->shouldHaveCount(1);
    }

}
