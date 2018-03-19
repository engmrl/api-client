<?php

namespace Engmrl\ApiClient\Request;

class UserFilterRequest extends FilterRequest
{
    const ENDPOINT = '/users';

    private $endpoint = self::ENDPOINT;

    private $httpMethod = 'GET';

    const FIELD_USERNAME = 'username';

    const FIELD_FIRST_NAME = 'firstName';

    const FIELD_LAST_NAME = 'lastName';

    const FIELD_EMAIL = 'email';

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }
}