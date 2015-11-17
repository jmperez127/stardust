<?php

namespace spec\Core\Controller;


use Core\Controller\BaseController;

class BaseControllerTest extends \PHPUnit_Framework_TestCase
{

    public function testControllerCanGetAllMethodsAsActions()
    {
        $myController = new MyController();
        $this->assertSame($myController->getActions(), array(
            "create",
            "delete",
            "update",
            "custom",
        ));
    }

}


class MyController extends BaseController
{
    public function create()
    {
        echo "Create Action";
    }

    public function delete()
    {
        echo "Delete Action";
    }

    public function update()
    {
        echo "Update Action";
    }

    public function custom()
    {
        echo "Custom Action";
    }
    private function privateMethod(){
        echo "I'm private";
    }
}
