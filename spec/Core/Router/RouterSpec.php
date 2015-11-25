<?php

namespace spec\Core\Router;
require_once realpath(__DIR__ . '/../..')."/spec_helpers.php";

use Core\App\Application;
use Core\Router\Route;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\Fixtures\TestApp\Controllers\UsersController;

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

    function it_should_assign_a_controller_when_a_new_route_is_created(){
        Application::setRootPath(realpath(__DIR__."/../../Fixtures/TestApp"));

        $this->addRoute(new Route("GET", "/users/new"), new UsersController());

        $this->getRoutes()[0]->getController()->shouldReturnAnInstanceOf("UsersController");
        $this->getControllers()->shouldHaveCount(1);
    }

}
