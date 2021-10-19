<?php

namespace Thiagoprz\CartaoProtegido\Services;

use Thiagoprz\CartaoProtegido\http\Client;

/**
 * @package Thiagoprz\CartaoProtegido\Services
 * @author Thiago Przyczynski <przyczynski@gmail.com>
 */
class Token
{
    /**
     * @param string $Alias
     * @param \Thiagoprz\CartaoProtegido\Types\Card|array $Card
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function create($Alias, $Card)
    {
        $client = Client::getInstance();
        return $client->post('/v1/Token', compact('Alias', 'Card'));
    }

    /**
     * @param string $TokenReference
     * @param string $RemovedBy
     * @param string $Reason
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function remove($TokenReference, $RemovedBy = 'CardHolder', $Reason = 'Other')
    {
        $client = Client::getInstance();
        return $client->delete("/v1/token/$TokenReference", compact('RemovedBy', 'Reason'));
    }
}
