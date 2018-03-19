<?php

namespace Engmrl\ApiClient\Response;

class UserResponse extends Response
{
    public function __construct($data)
    {
        parent::__construct($data);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return (int) $this->data['id'];
    }

    public function getRole()
    {
        return $this->data['role'];
    }

    public function getEmail()
    {
        return $this->data['email'];
    }

    public function getUsername()
    {
        return $this->data['username'];
    }

    public function getFirstName()
    {
        return $this->data['firstName'];
    }

    public function getLastName()
    {
        return $this->data['lastName'];
    }

    public function getLocation()
    {
        return $this->data['location'];
    }

    public function getCreatedAt()
    {
        return !is_null($this->data['createdAt']) ? new \DateTime($this->data['createdAt']): null;
    }

    public function getUpdatedAt()
    {
        return !is_null($this->data['updatedAt']) ? new \DateTime($this->data['createdAt']): null;
    }

    public function __toString()
    {
        return (string) $this->data['id'];
    }
}