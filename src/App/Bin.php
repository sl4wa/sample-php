<?php

namespace App;

class Bin
{
    private Country $country;

    public function __construct(string $bin)
    {
        $binResults = file_get_contents('https://lookup.binlist.net/' . $bin);
        if (!$binResults) {
            $this->country = null;
        }
        $r = json_decode($binResults);
        $this->country = new Country($r->country->alpha2);
    }

    public function getCountry()
    {
        return $this->country;
    }
}
