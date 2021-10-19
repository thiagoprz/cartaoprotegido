<?php
namespace Thiagoprz\CartaoProtegido\Types;

/**
 * @package Thiagoprz\CartaoProtegido\Types
 * @author Thiago Przyczynski <przyczynski@gmail.com>
 */
abstract class AuthResponse
{
    /**
     * @var string The Token
     */
    public $access_token;

    /**
     * @var string Type of token (default "bearer")
     */
    public $token_type;

    /**
     * @var int Time in seconds to expire (default 599)
     */
    public $expires_in;
}
