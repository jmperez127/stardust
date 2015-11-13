<?php

namespace Core\Router;

use InvalidArgumentException;

class Route {
    protected  $method;
    protected  $allowed_methods = array("GET", "POST", "PUT", "DELETE", "PATCH");

    public function setMethod($method){
        if(!in_array($method, $this->allowed_methods))
            throw new InvalidArgumentException("Invalid Method");

        $this->method = $method;
    }

    public function getMethod(){
        return $this->method;
    }

}