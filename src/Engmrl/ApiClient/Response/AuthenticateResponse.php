<?php

namespace Engmrl\ApiClient\Response;

class AuthenticateResponse extends Response
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->data['token'];
    }

    /**
     * @return mixed
     */
    public function getExpires()
    {
        return $this->data['expires'];
    }

    /**
     * @return UserResponse
     */
    public function getUser()
    {
        return new UserResponse($this->data['user']);
    }
}