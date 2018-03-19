<?php

namespace Engmrl\ApiClient\Request;

trait UserTrait
{
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

    public function setFirstName($firstName)
    {
        $this->data['firstName'] = $firstName;
        return $this;
    }

    public function setLastName($lastName)
    {
        $this->data['lastName'] = $lastName;
        return $this;
    }

    public function setEmail($email)
    {
        $this->data['email'] = $email;
        return $this;
    }

    public function getUsername()
    {
        return $this->data['username'];
    }

    public function getPassword()
    {
        return $this->data['password'];
    }

    public function getFirstName()
    {
        return $this->data['firstName'];
    }

    public function getLastName()
    {
        return $this->data['lastName'];
    }

    public function getEmail()
    {
        return $this->data['email'];
    }
}