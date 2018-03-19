<?php

namespace Engmrl\ApiClient\Request;

abstract class FilterRequest implements FilterRequestInterface
{
    protected $timeout = 2.0;

    protected $data = [];

    protected $queryString = [];

    const SORT_ASC = 1;

    const SORT_DESC = -1;

    const LIKES = 'likes';

    /** = */
    const EQUAL = 'e';

    /** <= */
    const LESS_THAN_EQUAL = 'lte';

    /** >= */
    const GREATER_THAN_EQUAL = 'gte';

    /** < */
    const LESS_THAN = 'lt';

    /** > */
    const GREATER_THAN = 'gt';

    /** != */
    const NOT_EQUAL = 'ne';

    /** like */
    const LIKE = 'l';

    public function setTimeout(int $timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    public function throwException($property)
    {
        throw new \Exception(sprintf("Class: %s, Data Property: %s", get_class($this), $property));
    }

    public function getQueryString()
    {
        return $this->queryString;
    }

    /**
     * ?include=user
     *
     * @param array $include
     * @return $this
     */
    public function setInclude(array $include = [])
    {
        if (empty($fields)) {
            $this->queryString['include'] = implode(',', $include);
        }
        return $this;
    }

    /**
     * ?fields=title,author
     *
     * @param array $fields
     * @return $this
     */
    public function setFields(array $fields = [])
    {
        if (empty($fields)) {
            $this->queryString['fields'] = implode(',', $fields);
        }
        return $this;
    }

    /**
     * ?offset=10
     *
     * @param int $offset
     * @return $this
     */
    public function setOffset(int $offset)
    {
        $this->queryString['offset'] = $offset;
        return $this;
    }

    /**
     * ?limit=10
     *
     * @param int $limit
     * @return $this
     */
    public function setLimit(int $limit)
    {
        $this->queryString['limit'] = $limit;
        return $this;
    }

    /**
     * ?having={"author":"Jake","likes":10}
     *
     * @param array $having
     * @return $this
     */
    public function setHaving(array $having = [])
    {
        $this->queryString['having'] = \json_encode($having);
        return $this;
    }

    /**
     * ?where={"likes":{"gte":10}}
     *
     * @param array $where
     * @return $this
     */
    public function setWhere(array $where = [])
    {
        $this->queryString['where'] = \json_encode($where);
        return $this;
    }

    /**
     * ?or=[{"author":{"e":"Jake"}},{author:{"e":"Alex"}}]
     *
     * @param array $or
     * @return $this
     */
    public function setOr(array $or = [])
    {
        $this->queryString['or'] = \json_encode($or);
        return $this;
    }

    /**
     * ?in={"author":["Jake","Billy"]}
     *
     * @param array $in
     * @return $this
     */
    public function setIn(array $in = [])
    {
        $this->queryString['in'] = \json_encode($in);
        return $this;
    }

    /**
     * ?sort={"likes":-1}
     *
     * @param array $sort
     * @return $this
     */
    public function setSort(array $sort = [])
    {
        $this->queryString['sort'] = \json_encode($sort);
        return $this;
    }

}