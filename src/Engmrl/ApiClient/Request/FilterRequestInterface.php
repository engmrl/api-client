<?php

namespace Engmrl\ApiClient\Request;

interface FilterRequestInterface
{
    const ENDPOINT = '';

    public function getHttpMethod();

    public function getEndPoint();
}