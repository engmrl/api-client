<?php

namespace Engmrl\ApiClient\Request;

class AuthenticateRequest extends Request
{
    const ENDPOINT = '/users/authenticate';

    private $endpoint = self::ENDPOINT;

    private $httpMethod = 'POST';

    public function setUsername($username)
    {
        $this->data['username'] = $username;
        return $this;
    }

    public function setPassword($password)
    {
        $this->data['password'] = $password;
        return $this;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getUsername()
    {
        return $this->data['username'];
    }

    public function getPassword()
    {
        return $this->data['password'];
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function isValid()
    {
        if (empty($this->data['username'])) {
            $this->throwException('username');
        }

        if (empty($this->data['password'])) {
            $this->throwException('password');
        }

        return true;
    }
}