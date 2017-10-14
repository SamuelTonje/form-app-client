<?php

namespace MainBundle\Api;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Gateway
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param bool $cache
     * @param int $cacheTTL
     * @return \GuzzleHttp\Message\ResponseInterface
     */
    public function getVersion($cache = false, $cacheTTL = 0)
    {
        $response = $this->client->get('/version', Client::FORMAT_JSON, [], [], $cache, $cacheTTL);

        return $response['body'];
    }

    /**
     * @param $username
     * @param $password
     * @return null|string
     */
    public function getToken($username, $password)
    {
        return $this->client->auth($username, $password, 1);
    }

}
