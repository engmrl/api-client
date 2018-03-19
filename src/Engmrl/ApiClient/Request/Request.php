<?php

namespace Engmrl\ApiClient\Request;

abstract class Request implements RequestInterface
{
    protected $timeout = 2.0;

    protected $data = [];


    public function setTimeout(int $timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    public function throwException($property)
    {
        throw new \Exception(sprintf("Class: %s, Data Property: %s", get_class($this), $property));
    }

    public function getData()
    {
        return $this->data;
    }

}