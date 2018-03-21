<?php

namespace Engmrl\ApiClient\Request;

class CommentFilterRequest extends FilterRequest
{
    const ENDPOINT = '/comments';

    private $endpoint = self::ENDPOINT;

    private $httpMethod = 'GET';

    const FIELD_ID = 'id';

    const FIELD_PARENT_ID = 'parentId';

    const FIELD_COMMENT = 'comment';

    const FIELD_CREATED_AT = 'createdAt';

    const FIELD_UPDATED_AT = 'updatedAt';

    const FIELD_USER_ID = 'userId';

    const INCLUDE_PARENT_COMMENT = 'parentComment';

    const INCLUDE_CHILD_COMMENTS = 'childComments';

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