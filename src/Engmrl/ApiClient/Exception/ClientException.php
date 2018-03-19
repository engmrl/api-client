<?php

namespace Engmrl\ApiClient\Exception;

use GuzzleHttp\Exception\RequestException;

class ClientException extends \Exception
{
    /** @var  RequestException */
    private $requestException;

    private $errorData = [];

    public function __construct(RequestException $exception)
    {
        parent::__construct($exception->getMessage(), $exception->getCode());
        $this->requestException = $exception;
    }

    private function getResponseData()
    {
        if (empty($this->errorData)) {
            $json = $this->requestException->getResponse()->getBody()->getContents();
            $data = \json_decode($json, true);
            $this->errorData = $data['error'];
        }
        return $this->errorData;
    }

    public function getErrorCode()
    {
        return $this->getResponseData()['code'];
    }

    public function getErrorMessage()
    {
        return $this->getResponseData()['message'];
    }

    public function getErrorFile()
    {
        return $this->getResponseData()['developer']['file'] ?? null;
    }

    public function getErrorLine()
    {
        return $this->getResponseData()['developer']['line'] ?? null;
    }

    public function getErrorRequest()
    {
        return $this->getResponseData()['developer']['request'] ?? null;
    }

    public function getValidationError()
    {
        return $this->getResponseData()['validation'] ?? null;
    }

    /**
     * @return RequestException
     */
    public function getRequestException()
    {
        return $this->requestException;
    }
}