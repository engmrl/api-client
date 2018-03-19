<?php

namespace Engmrl\ApiClient\Response;

class CommentResponse extends Response
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

    /**
     * @return int
     */
    public function getParentId()
    {
        return (int) $this->data['parentId'];
    }

    /**
     * @return CommentResponse|null
     */
    public function getParentComment()
    {
        return isset($this->data['parentComment']) ? new CommentResponse($this->data['parentComment']) : null;
    }

    /**
     * @return UserResponse
     */
    public function getUser()
    {
        return new UserResponse($this->data['user']);
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return (int) $this->data['parentId'];
    }

    public function getComment()
    {
        return $this->data['comment'];
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