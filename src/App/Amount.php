<?php

namespace App;

use Brick\Money\Money;
use Brick\Math\RoundingMode;

class Amount
{
    private string $value;

    public function __construct(string $currency, float $amount, float $rate, bool $is_eu)
    {
        if ($currency == 'EUR' || $rate == 0) {
            $amntFixed = Money::of($amount, 'EUR');
        }
        if ($currency != 'EUR' || $rate > 0) {
            $amntFixed = Money::of($amount, 'EUR');
            $amntFixed = $amntFixed->dividedBy($rate, RoundingMode::UP);
        }

        $amntFixed = $amntFixed->multipliedBy(($is_eu ? 0.01 : 0.02), RoundingMode::UP);
        $this->value = (string) $amntFixed->getAmount();
    }

    public function getValue()
    {
        return $this->value;
    }
}
