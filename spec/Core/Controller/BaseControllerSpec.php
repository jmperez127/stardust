<?php
namespace spec\Core\Controller;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BaseConotrollerSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Controller\BaseController');
    }

}

