<?php

namespace Thiagoprz\CartaoProtegido\http;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;

/**
 * @package Thiagoprz\CartaoProtegido\http
 * @author Thiago Przyczynski <przyczynski@gmail.com>
 */
class Client
{
    /**
     * @var array
     */
    private static $instances = [];

    /**
     * @var GuzzleClient
     */
    private $httpClient;

    /**
     *
     */
    protected function __construct()
    {
        $this->httpClient = new GuzzleClient([
            'base_uri' => config('braspag-cartao-protegido.baseUrl'),
            'timeout' => config('braspag-cartao-protegido.timeout'),
            'proxy' => config('braspag-cartao-protegido.proxy'),
        ]);
    }

    /**
     * @link https://braspag.github.io//manual/cartao-protegido-api-rest?shell#etapa-de-autentica%C3%A7%C3%A3o
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return \Thiagoprz\CartaoProtegido\Types\AuthResponse
     */
    private function authenticate()
    {
        return Cache::remember('token', config('braspag-cartao-protegido.tokenCachedTime'), function() {
            $res = $this->httpClient->post('/oauth2/token', [
                'headers' => [
                    'Authorization' => 'Basic ' . config('braspag-cartao-protegido.clientId') . ':' . config('braspag-cartao-protegido.clientSecret'),
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
            ]);
            return json_decode((string)$res->getBody());
        });
    }

    /**
     * @param string $url
     * @return mixed
     * @throws GuzzleException
     */
    public function get($url)
    {
        $data = $this->httpClient->get($url, [
            'headers' => $this->headers(),
        ]);
        return json_decode((string)$data->getBody());
    }

    /**
     * @param string $url
     * @param mixed $data
     * @return mixed
     * @throws GuzzleException
     */
    public function post($url, $data)
    {
        $data = $this->httpClient->post($url, [
            'body' => json_encode($data),
            'headers' => $this->headers(),
        ]);
        return json_decode((string)$data->getBody());
    }

    /**
     * @param string $url
     * @param array $data
     * @return mixed
     * @throws GuzzleException
     */
    public function delete($url, $data)
    {
        $data = $this->httpClient->delete($url, [
            'headers' => $this->headers(),
            'body' => json_encode($data),
        ]);
        return json_decode((string)$data->getBody());
    }

    private function headers()
    {
        $auth = $this->authenticate();
        return [
            'Content-Type' => 'application/json',
            'MerchantId' => config('braspag-cartao-protegido.merchantId'),
            'Authorization' => 'Bearer ' . $auth->access_token,
        ];
    }


    /**
     * Singletons should not be cloneable.
     */
    protected function __clone() { }

    /**
     * Singletons should not be restorable from strings.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * This is the static method that controls the access to the singleton
     * instance. On the first run, it creates a singleton object and places it
     * into the static field. On subsequent runs, it returns the client existing
     * object stored in the static field.
     *
     * This implementation lets you subclass the Singleton class while keeping
     * just one instance of each subclass around.
     */
    public static function getInstance(): Client
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}
