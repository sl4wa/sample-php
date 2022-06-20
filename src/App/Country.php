<?php

namespace App;

class Country
{
    private string $code;
    private const EU = ['AT', 'BE', 'BG', 'CY', 'CZ', 'DE', 'DK', 'EE', 'ES', 'FI', 'FR', 'GR', 'HR', 'HU', 'IE', 'IT', 'LT', 'LU', 'LV', 'MT', 'NL', 'PO', 'PT', 'RO', 'SE', 'SI', 'SK'];

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function isEu(): bool
    {
        if (in_array($this->code, self::EU)) {
            return true;
        }

        return false;
    }
}
