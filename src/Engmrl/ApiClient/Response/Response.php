<?php

namespace Engmrl\ApiClient\Response;

abstract class Response
{
    protected $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getRawData($column)
    {
        return array_key_exists($column, $this->data) ? $this->data[$column] : null;
    }

    public function getJson()
    {
        return \json_decode($this->data);
    }
}