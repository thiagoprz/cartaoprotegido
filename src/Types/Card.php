<?php

namespace Thiagoprz\CartaoProtegido\Types;

/**
 * @package Thiagoprz\CartaoProtegido\Types
 * @author Thiago Przyczynski <przyczynski@gmail.com>
 */
abstract class Card
{
    /**
     * @var string|int
     */
    public $Number;

    /**
     * @var string
     */
    public $Holder;

    /**
     * @var string mm/YYYY
     */
    public $ExpirationDate;

    /**
     * @var int|string
     */
    public $SecurityCode;
}
