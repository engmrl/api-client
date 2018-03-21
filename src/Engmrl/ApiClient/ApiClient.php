<?php

namespace Engmrl\ApiClient;

use Engmrl\ApiClient\Data\Collection;
use Engmrl\ApiClient\Request\AuthenticateRequest;

use Engmrl\ApiClient\Request\CommentFilterRequest;
use Engmrl\ApiClient\Request\CreateUserRequest;
use Engmrl\ApiClient\Response\AuthenticateResponse;
use Engmrl\ApiClient\Response\CommentResponse;
use Engmrl\ApiClient\Response\UserResponse;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException as HttpRequestException;
use Engmrl\ApiClient\Exception\ClientException;

class ApiClient
{
    const METHOD_GET = 'GET';

    const METHOD_POST = 'POST';

    const METHOD_PUT = 'PUT';

    const METHOD_DELETE = 'DELETE';

    const METHOD_OPTIONS = 'OPTIONS';

    private $host;

    /** @var  HttpClient */
    private $client;

    private $token;

    public function __construct($host)
    {
        $this->host = $host;
        $this->createClient();
    }

    private function createClient()
    {
        $headers = [
            'Content-Type' => 'application/json',
        ];

        if (!empty($this->token)) {
            $headers['Authorization'] = sprintf('Bearer %s', $this->token);
        }

        $this->client = new HttpClient([
            'base_uri' => $this->host,
            'timeout' => 2.0,
            'headers' => $headers,
        ]);
    }

    public function setToken($token)
    {
        $this->token = $token;
        $this->createClient();
    }

    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param AuthenticateRequest $request
     * @return AuthenticateResponse
     * @throws Exception\ClientException
     */
    public function authenticate(AuthenticateRequest $request)
    {
        $request->isValid();

        try {
            $res = $this->client->request($request->getHttpMethod(), $request->getEndpoint(), [
                'auth' => [$request->getUsername(), $request->getPassword()]
            ]);

            $response = new AuthenticateResponse($this->responseData($res));
            $this->setToken($response->getToken());

            return $response;
        } catch (HttpRequestException $e) {
            throw new ClientException($e);
        }
    }

    /**
     * @return UserResponse
     * @throws Exception\ClientException
     */
    public function getAuthenticatedUser()
    {
        try {
            $res = $this->client->request(ApiClient::METHOD_GET, '/users/me');

            return new UserResponse($this->responseData($res, 'user'));
        } catch (HttpRequestException $e) {
            throw new ClientException($e);
        }
    }

    /**
     * @param CreateUserRequest $request
     * @return UserResponse
     * @throws Exception\ClientException
     */
    public function createUser(CreateUserRequest $request)
    {
        $request->isValid();

        try {
            $res = $this->client->request($request->getHttpMethod(), $request->getEndpoint(), [
                'form_params' => $request->getData()
            ]);

            $response = new UserResponse($this->responseData($res, 'user'));

            return $response;
        } catch (HttpRequestException $e) {
            throw new ClientException($e);
        }
    }

    /**
     * @param CommentFilterRequest $request
     * @return array
     * @throws Exception\ClientException
     */
    public function comments(CommentFilterRequest $request)
    {
        try {
            $res = $this->client->request($request->getHttpMethod(), $request->getEndpoint(), [
                'query' => $request->getQueryString()
            ]);

            $response = $this->responseCollection($res, 'comments', CommentResponse::class);

            return $response;
        } catch (HttpRequestException $e) {
            throw new ClientException($e);
        }
    }

    /**
     * @param int $id
     * @param CommentFilterRequest $request
     * @return CommentResponse
     * @throws Exception\ClientException
     */
    public function commentDetail(int $id, CommentFilterRequest $request)
    {
        try {
            $res = $this->client->request($request->getHttpMethod(), sprintf('%s/%d', $request->getEndpoint(), $id), [
                'query' => $request->getQueryString()
            ]);

            $response = new CommentResponse($this->responseData($res, 'comment'));

            return $response;
        } catch (HttpRequestException $e) {
            throw new ClientException($e);
        }
    }

    /**
     * @param $response
     * @return mixed
     */
    protected function responseData($response, $key = 'data')
    {
        $json = $response->getBody()->getContents();
        unset($response);
        $data = \json_decode($json, true);
        return $data[$key];
    }

    /**
     * @param $response
     * @param string $key
     * @param $class
     * @return array
     */
    protected function responseCollection($response, $key = 'data', $class)
    {
        $json = $response->getBody()->getContents();
        unset($response);
        $data = \json_decode($json, true);

        return new Collection($data, $key, $class);
    }
}