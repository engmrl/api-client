<?php

namespace Engmrl\ApiClient\Request;

use Engmrl\ApiClient\Request\UserTrait;

class CreateUserRequest extends Request
{
    use UserTrait;

    const ENDPOINT = '/users';

    private $endpoint = self::ENDPOINT;

    private $httpMethod = 'POST';

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

    public function isValid()
    {
        if (empty($this->data['username'])) {
            $this->throwException('username');
        }

        if (empty($this->data['password'])) {
            $this->throwException('password');
        }

        if (empty($this->data['firstName'])) {
            $this->throwException('firstName');
        }

        if (empty($this->data['lastName'])) {
            $this->throwException('lastName');
        }

        if (empty($this->data['email'])) {
            $this->throwException('email');
        }

        return true;
    }
}