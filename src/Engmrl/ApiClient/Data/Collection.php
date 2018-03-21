<?php

namespace Engmrl\ApiClient\Data;

class Collection
{
    private $rawData = [];

    private $data = [];

    private $responseClass;

    /**
     * @param $rawData
     * @param $key
     * @param $responseClass
     */
    public function __construct($rawData, $key, $responseClass)
    {
        $this->responseClass = $responseClass;
        $this->rawData = $rawData;

        if (!empty($rawData[$key])) {
            foreach ($rawData[$key] as $r) {
                $this->appendData($r);
            }
        }
    }

    /**
     * @param $data
     */
    public function appendData($data)
    {
        $this->data[] = new $this->responseClass($data);
    }

    /**
     * @return null|int
     */
    public function getTotalCount()
    {
        return isset($this->rawData['totalCount']) ? $this->rawData['totalCount'] : null;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function getRawData()
    {
        return $this->rawData;
    }
}