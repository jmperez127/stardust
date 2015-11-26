<?php

namespace spec\Stardust\Router;
require_once realpath(__DIR__ . '/../..')."/spec_helpers.php";

use Stardust\App\Application;
use Stardust\Router\Route;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\Fixtures\TestApp\App\Controllers\UsersController;

class RouterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Stardust\Router\Router');
    }

    function it_holds_an_array_of_routes(){
        $this->getRoutes()->shouldHaveCount(0);
    }

    function it_allow_new_routes_to_be_added(){
        $this->addRoute(new Route("GET", "/users/new", "users#new"));
        $this->getRoutes()->shouldHaveCount(1);
        $this->getRoutes()[0]->getMethod()->shouldReturn("GET");
    }

//    function it_should_assign_a_controller_to_a_new_route(){
//        Application::setRootPath(realpath(__DIR__."/../../Fixtures/TestApp"));
//
//        $this->addRoute(new Route("GET", "/users/new", "users#new"));
//
//        $this->getControllerForRoute($this->getRoutes()[0])->shouldReturnAnInstanceOf("UsersController");;
//        $this->getControllers()->shouldHaveCount(1);
//    }

}
