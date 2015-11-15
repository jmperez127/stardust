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
        $this->addRoute(new Route("GET", "/users/new"));
        $this->getRoutes()->shouldHaveCount(1);
        $this->getRoutes()[0]->getMethod()->shouldReturn("GET");
    }

    function it_expects_a_controller_when_a_new_route_is_created(){
        $this->addRoute(new Route("GET", "/users/new"));
        $this->getControllers()->shouldHaveCount(1);
    }

}
