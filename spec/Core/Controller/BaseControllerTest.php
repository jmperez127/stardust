<?php

namespace spec\Core\Controller;

use spec\Fixtures\TestApp\App\Controllers\FixtureController;

class BaseControllerTest extends \PHPUnit_Framework_TestCase
{

    public function testControllerCanGetAllMethodsAsActions()
    {
        $myController = new FixtureController();
        $this->assertSame($myController->getActions(), array(
            "create",
            "delete",
            "update",
            "custom",
        ));
    }

}