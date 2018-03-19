<?php

namespace Engmrl\ApiClient\Request;

interface RequestInterface
{
    const ENDPOINT = '';

    public function isValid();

    public function getHttpMethod();

    public function getEndPoint();
}