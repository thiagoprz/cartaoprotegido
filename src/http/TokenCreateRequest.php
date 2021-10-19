<?php

namespace Thiagoprz\CartaoProtegido\http;

/**
 * @package Thiagoprz\CartaoProtegido\Types
 * @author Thiago Przyczynski <przyczynski@gmail.com>
 */
abstract class TokenCreateRequest
{
    /**
     * @var string
     */
    public $Alias;

    /**
     * @var Card
     */
    public $Card;
}
