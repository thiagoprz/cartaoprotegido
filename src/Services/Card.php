<?php

namespace Thiagoprz\CartaoProtegido\Services;

/**
 * @package Thiagoprz\CartaoProtegido\Types
 * @author Thiago Przyczynski <przyczynski@gmail.com>
 */
class Card implements \JsonSerializable
{
    /**
     * @var string|int
     */
    protected $Number;

    /**
     * @var string
     */
    protected $Holder;

    /**
     * @var string mm/YYYY
     */
    protected $ExpirationDate;

    /**
     * @var int|string
     */
    protected $SecurityCode;

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

    /**
     * @return int|string
     */
    public function getNumber()
    {
        return $this->Number;
    }

    /**
     * @param int|string $Number
     */
    public function setNumber($Number): void
    {
        $this->Number = str_replace(['-', '.', '/', ' '], '', $Number);
    }

    /**
     * @return int|string
     */
    public function getSecurityCode()
    {
        return $this->SecurityCode;
    }

    /**
     * @param int|string $SecurityCode
     */
    public function setSecurityCode($SecurityCode): void
    {
        $this->SecurityCode = $SecurityCode;
    }

    /**
     * @return string
     */
    public function getHolder(): string
    {
        return $this->Holder;
    }

    /**
     * @param string $Holder
     */
    public function setHolder(string $Holder): void
    {
        $this->Holder = $Holder;
    }

    /**
     * @return string
     */
    public function getExpirationDate(): string
    {
        return $this->ExpirationDate;
    }

    /**
     * @param string $ExpirationDate
     */
    public function setExpirationDate(string $ExpirationDate): void
    {
        $this->ExpirationDate = $ExpirationDate;
    }
}
