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

    function it_holds_the_action_name_for_the_requested_url(){
        $this->setAction("/users/new");
        $this->getAction()->shouldReturn("/users/new");
    }

    function it_throws_error_when_registering_a_wrong_route_action(){
        $this->shouldThrow('\InvalidArgumentException')->duringSetAction("invalid route");
    }

    function it_has_an_array_of_param_names(){
        $this->setAction("/users/:id/post/:post_id/edit");
        $this->getParamNames()->shouldContain(':id');
        $this->getParamNames()->shouldContain(':post_id');
    }

}