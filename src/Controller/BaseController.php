<?php
namespace Core\Controller;

abstract class BaseController
{
    public function getActions()
    {
        $methods = $this->getControllerMethods();
        return $methods;
    }

    protected function getControllerMethods()
    {
        $abstractMethods = get_class_methods("Core\Controller\BaseController");
        $controllerMethods = get_class_methods($this);
        return $this->excludeAbstractMethods($abstractMethods, $controllerMethods);
    }

    private function excludeAbstractMethods($abstractMethods, $controllerMethods)
    {
        $methods = array();
        foreach ($controllerMethods as $controllerMethod) {
            if (!in_array($controllerMethod, $abstractMethods))
                $methods[] = $controllerMethod;
        }
        return $methods;
    }
}
