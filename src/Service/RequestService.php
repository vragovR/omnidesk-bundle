<?php
namespace OmnideskBundle\Service;

use GuzzleHttp\Client;

/**
 * Class RequestService
 * @package OmnideskBundle\Service
 */
class RequestService
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var Client
     */
    protected $client;

    /**
     * RequestService constructor.
     * @param array  $config
     * @param Client $client
     */
    public function __construct(array $config, Client $client)
    {
        $this->config = $config;
        $this->client = $client;
    }

    /**
     * @param string $url
     * @param array  $params
     * @return array
     */
    public function post($url, array $params = [])
    {
        $response = $this->client->post($this->getUrl($url), [
            'headers' => $this->getHeaders(),
            'auth' => $this->getAuth(),
            'query' => $params,
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param string $url
     * @param array  $params
     * @return array
     */
    public function get($url, array $params = [])
    {
        $response = $this->client->get($this->getUrl($url), [
            'headers' => $this->getHeaders(),
            'auth' => $this->getAuth(),
            'query' => $params,
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param string $url
     * @return string
     */
    protected function getUrl($url)
    {
        return sprintf('https://%s.omnidesk.ru/api/%s.json', $this->config['domain'], $url);
    }

    /**
     * @return array
     */
    protected function getHeaders()
    {
        return [
            'Content-Type' => 'application/json',
            'Content-Length' => 0,
        ];
    }

    /**
     * @return array
     */
    protected function getAuth()
    {
        return [
            $this->config['email'],
            $this->config['key'],
        ];
    }
}
