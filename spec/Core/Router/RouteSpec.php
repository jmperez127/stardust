<?php

namespace spec\Core\Router;
require_once realpath(__DIR__ . '/../..')."/spec_helpers.php";

use Core\Router;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\Fixtures\TestApp\Controllers\FixtureController;

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

    function it_holds_a_path_definition(){
        $this->setPath("/users/new");
        $this->getPath()->shouldReturn("/users/new");
    }

    function it_throws_an_error_when_registering_a_wrong_path(){
        $this->shouldThrow('\InvalidArgumentException')->duringSetPath("invalid path");
    }

    function it_has_an_array_of_param_names_for_a_given_path(){
        $this->setPath("/users/:id/post/:post_id/edit");
        $this->getParamNames()->shouldContain(':id');
        $this->getParamNames()->shouldContain(':post_id');
    }

    function it_should_have_an_action_path_which_tells_which_controller_and_action_to_use(){
        $this->setPath("/users/new");
        $this->setMethod("GET");
        $this->setActionPath("users#new");
        $this->getActionPath()->shouldReturn("users#new");
        $this->getRouteInfo()->shouldReturn("GET\t/users/new\tusers#new");
    }

    function it_throws_an_error_when_registering_a_wrong_action_path(){
        $this->shouldThrow('\InvalidArgumentException')->duringSetActionPath("user");
    }

}

