<?php

namespace spec\Core\Router;
require_once realpath(__DIR__ . '/../..')."/spec_helpers.php";

use Core\Router;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\Fixtures\Controllers\FixtureController;

class RouteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Router\Route');
    }

    function it_can_set_be_set_to_GET_POST_PUT_OR_DELETE_methods(){
        $methods = array("GET", "POST", "PUT", "DELETE", "PATCH");
        foreach ($methods as $method) {
            $this->setMethod($method);
            $this->getMethod()->shouldReturn($method);
        }
    }

    function it_should_throw_an_excpetion_when_trying_to_add_a_wrong_method(){
        $this->shouldThrow('\InvalidArgumentException')->duringSetMethod("INVALID");
    }

    function it_holds_a_url_definition(){
        $this->setUrl("/users/new");
        $this->getUrl()->shouldReturn("/users/new");
    }

    function it_throws_error_when_registering_a_wrong_url_route(){
        $this->shouldThrow('\InvalidArgumentException')->duringSetUrl("invalid route");
    }

    function it_has_an_array_of_param_names(){
        $this->setUrl("/users/:id/post/:post_id/edit");
        $this->getParamNames()->shouldContain(':id');
        $this->getParamNames()->shouldContain(':post_id');
    }

    function it_allows_a_reference_to_the_controller_and_action_to_be_set(){
        $this->setUrl("/users/new");
        $controller = new FixtureController();
        $this->setController($controller);
        $this->setActionName("new");
        $this->getController()->shouldHaveType("FixtureController");
    }


}

