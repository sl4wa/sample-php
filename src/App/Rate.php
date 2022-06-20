<?php

namespace App;

class Rate
{
    private float $value;
    private const API_KEY = '4WRxMz5yE84aHLR9fvUm4h16484RrdVc';

    public function __construct(string $currency)
    {
        $this->value = @json_decode(file_get_contents('https://api.apilayer.com/fixer/latest?base=EUR&apikey='.self::API_KEY), true)['rates'][$currency];
    }

    public function getValue()
    {
        return $this->value;
    }
}
