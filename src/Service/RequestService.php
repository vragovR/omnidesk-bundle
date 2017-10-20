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
     * @param string $name
     * @param array  $params
     * @return array
     */
    public function postMultipart($url, $name, array $params = [])
    {
        $multipart = [];

        foreach ($params as $key => $param) {
            if ($key !== 'attachments' && $key !== 'custom_fields') {
                $multipart[] = [
                    'name' => "{$name}[{$key}]",
                    'contents' => $param,
                ];
            }
        }

        if (isset($params['attachments']) && $attachments = (array) $params['attachments']) {
            foreach ($attachments as $key => $attachment) {
                $multipart[] = [
                    'name' => "{$name}[attachments][{$key}]",
                    'contents' => fopen($attachment, 'rb'),
                ];
            }
        }

        if (isset($params['custom_fields']) && $fields = (array) $params['custom_fields']) {
            foreach ($fields as $key => $field) {
                $multipart[] = [
                    'name' => "{$name}[custom_fields][{$key}]",
                    'contents' => $field,
                ];
            }
        }

        $response = $this->client->post($this->getUrl($url), [
            'auth' => $this->getAuth(),
            'multipart' => $multipart,
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
     * @param array  $params
     * @return array
     */
    public function put($url, array $params = [])
    {
        $response = $this->client->put($this->getUrl($url), [
            'headers' => $this->getHeaders(),
            'auth' => $this->getAuth(),
            'json' => $params,
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param string $url
     * @return int
     */
    public function delete($url)
    {
        $response = $this->client->delete($this->getUrl($url), [
            'headers' => $this->getHeaders(),
            'auth' => $this->getAuth(),
        ]);

        return $response->getStatusCode();
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
