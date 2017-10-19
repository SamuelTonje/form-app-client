<?php

namespace MainBundle\Api;

use Doctrine\Common\Cache\Cache;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ServerException;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Validation;

class Client
{
    const FORMAT_JSON = 'json';
    const FORMAT_XML = 'xml';
    const FORMAT_RAW = 'raw';

    /**
     * @var string
     */
    private $apiUrl;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var Cache
     */
    private $cache;

    /**
     *
     * JSON Web Token
     *
     * @var string
     */
    private $jwt;

    /**
     *
     * @var integer
     */
    private $maxAuthTry;

    /**
     * @var boolean
     */
    private $verifySSL;

    /**
     * @param GuzzleClient $client
     * @param $apiUrl
     * @param $username
     * @param $password
     * @param int $maxAuthTry
     * @param bool $verifySSL
     */
    public function __construct(GuzzleClient $client, $apiUrl, $username, $password, $maxAuthTry = 2, $verifySSL = true)
    {
        $this->client = $client;
        $this->username = $username;
        $this->password = $password;
        $this->apiUrl = $apiUrl;
        $this->maxAuthTry = (int)$maxAuthTry;
        $this->verifySSL = (bool)$verifySSL;
    }

    /**
     * @param  string $method
     * @param  string $url
     * @param  string $responseFormat
     * @param  array $headers
     * @param  array $queryParameters
     * @param  array $fields
     * @param  boolean $cache enable data cache
     * @param  int $cacheTtl cache TTL (time to live), 0 for no TTL
     * @return array
     */
    public function sendRequest($method, $url, $responseFormat = self::FORMAT_RAW, $headers = [], $queryParameters = [], $fields = [], $cache = false, $cacheTtl = 0)
    {
        if (empty($headers['Authorization'])) {
            $jwt = $this->getJwt();
            if (!empty($jwt)) {
                $headers['Authorization'] = 'Bearer ' . $jwt;
            }
        }

        $request = $this->client->createRequest($method, $this->apiUrl . $url, [
            'headers' => $headers,
            'query' => (array)$queryParameters,
            'body' => (array)$fields,
            'verify' => $this->verifySSL,
        ]);

        $request->getConfig()->set('cache.disable', !$cache);
        $request->getConfig()->set('cache.ttl', (int)$cacheTtl);

        $response = $this->client->send($request);

        $result = [
            'code' => (int)$response->getStatusCode(),
            'reason' => $response->getReasonPhrase(),
            'headers' => $response->getHeaders(),
        ];

        switch ($responseFormat) {
            case self::FORMAT_JSON:
                $result['body'] = $response->json();
                break;

            case self::FORMAT_XML:
                $result['body'] = $response->xml();
                break;

            case self::FORMAT_RAW:
            default:
                $result['body'] = (string)$response->getBody();
        }

        return $result;
    }

    /**
     * Authenticate against API and get JSON Web Token
     *
     * @param $username
     * @param $password
     * @param int $maxTry
     * @param int $try
     * @return null
     * @throws \Exception
     */
    public function auth($username, $password, $maxTry = 1, $try = 1)
    {
        $jwt = null;
        $request = $this->client->createRequest('post', $this->apiUrl . '/v1/gettoken', [
            'body' => [
                'username' => $username,
                'password' => $password,
            ],
            'verify' => $this->verifySSL,
        ]);

        try {
            $response = $this->client->send($request);
        } catch (ServerException $exc) {

            $error = json_decode($exc->getResponse()->getBody());
            if (is_null($error)) {
                throw $exc;
            }
            throw new \Exception($error->message, $error->code);
        }
        if ($response->getStatusCode() == 200) {
            $result = $response->json();
            $jwt = empty($result['token']) ? null : $result['token'];
        } elseif ($try < $maxTry) {
            $jwt = $this->auth($username, $password, $maxTry, $try + 1);
        }

        return $jwt;
    }

    /**
     * get current saved JSON Web Token or get a new JSON Web token by authentication
     *
     * @return string|null
     */
    protected function getJwt()
    {
        if (empty($this->jwt)) {
            $this->jwt = $this->auth($this->username, $this->password, $this->maxAuthTry, 1);
        }

        return $this->jwt;
    }

    /**
     * @param  string $url
     * @param  string $responseFormat
     * @param  array $fields
     * @param  array $headers
     * @param  boolean $cache enable data cache
     * @param  int $cacheTtl cache TTL (time to live), 0 for no TTL
     * @return array
     */
    public function post($url, $responseFormat = self::FORMAT_RAW, $fields = [], $headers = [], $cache = false, $cacheTtl = 0)
    {
        try {
            return $this->sendRequest('POST', $url, $responseFormat, $headers, [], $fields, $cache, $cacheTtl);
        } catch (ServerException $e) {
            $response['body'] = static::changeFatalErrorMessageFromCodeLevel($e->getCode(), $e->getMessage());
        }
        return $response;
    }

    /**
     * @param  string $url
     * @param  string $responseFormat
     * @param  array $queryParameters
     * @param  array $headers
     * @param  boolean $cache enable data cache
     * @param  int $cacheTtl cache TTL (time to live), 0 for no TTL
     * @return array
     */
    public function get($url, $responseFormat = self::FORMAT_RAW, $queryParameters = [], $headers = [], $cache = false, $cacheTtl = 0)
    {
        try {
            return $this->sendRequest('GET', $url, $responseFormat, $headers, $queryParameters, [], $cache, $cacheTtl);
        } catch (ServerException $e) {
            $resp = $e->getResponse();
            $response['body'] = $resp->getBody()->getContents();
        }
        return $response;
    }

    /**
     * @param  string $url
     * @param  string $responseFormat
     * @param  array $fields
     * @param  array $headers
     * @param  boolean $cache enable data cache
     * @param  int $cacheTtl cache TTL (time to live), 0 for no TTL
     * @return array
     */
    public function put($url, $responseFormat = self::FORMAT_RAW, $fields = [], $headers = [], $cache = false, $cacheTtl = 0)
    {
        try {
            return $this->sendRequest('PUT', $url, $responseFormat, $headers, [], $fields, $cache, $cacheTtl);
        } catch (ServerException $e) {
            $response['body'] = static::changeFatalErrorMessageFromCodeLevel($e->getCode(), $e->getMessage());
        }
        return $response;
    }

    /**
     * @param  string $url
     * @param  string $responseFormat
     * @param  array $fields
     * @param  array $headers
     * @param  boolean $cache enable data cache
     * @param  int $cacheTtl cache TTL (time to live), 0 for no TTL
     * @return array
     */
    public function patch($url, $responseFormat = self::FORMAT_RAW, $fields = [], $headers = [], $cache = false, $cacheTtl = 0)
    {
        try {
            return $this->sendRequest('PATCH', $url, $responseFormat, $headers, [], $fields, $cache, $cacheTtl);
        } catch (ServerException $e) {
            $response['body'] = static::changeFatalErrorMessageFromCodeLevel($e->getCode(), $e->getMessage());
        }
        return $response;
    }

    /**
     * @param  string $url
     * @param  string $responseFormat
     * @param  int $id
     * @param  array $headers
     * @param  boolean $cache enable data cache
     * @param  int $cacheTtl cache TTL (time to live), 0 for no TTL
     * @return array
     */
    public function delete($url, $responseFormat = self::FORMAT_RAW, $id, $headers = [], $cache = false, $cacheTtl = 0)
    {
        try {
            return $this->sendRequest('DELETE', $url, $responseFormat, $headers, ['id' => $id], [], $cache, $cacheTtl);
        } catch (ServerException $e) {
            $response['body'] = static::changeFatalErrorMessageFromCodeLevel($e->getCode(), $e->getMessage());
        }
        return $response;
    }

    /**
     * @param $code
     * @param $message
     * @return string
     */
    static public function changeFatalErrorMessageFromCodeLevel($code, $message)
    {
        $messageFor_500 = 'Connexion impossible, veuillez réessayer dans quelques instants';
        if (strripos($code, '50') === 0) {
            return $messageFor_500;
        }
        return $message;
    }
}
