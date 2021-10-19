<?php

namespace Thiagoprz\CartaoProtegido\http;

/**
 * @package Thiagoprz\CartaoProtegido\Types
 * @author Thiago Przyczynski <przyczynski@gmail.com>
 */
abstract class TokenCreateResponse extends Card
{
    /**
     * @var string
     */
    public $TokenReference;

    /**
     * @var string YYYY-mm-dd
     */
    public $ExpirationDate;

    /**
     * @var array
     * <ul>
     *  <li>{ "method": "GET", "Rel": "self", "HRef": "https://cartaoprotegidoapisandbox.braspag.com.br/v1/Token/c2e0d46e-6a78-409b-9ad4-75bcb3985762"}</li>
     *  <li>{ "method": "DELETE", "Rel": "remove", "HRef": "https://cartaoprotegidoapisandbox.braspag.com.br/v1/Token/c2e0d46e-6a78-409b-9ad4-75bcb3985762"}</li>
     *  <li>{ "method": "PUT", "Rel": "suspend", "HRef": "https://cartaoprotegidoapisandbox.braspag.com.br/v1/Token/c2e0d46e-6a78-409b-9ad4-75bcb3985762"}</li>
     * </ul>
     */
    public $Links = [];
}
