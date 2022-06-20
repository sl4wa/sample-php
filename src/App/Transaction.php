<?php

namespace App;

class Transaction
{
    private string $bin;
    private float $amount;
    private string $currency;

    public function __construct(string $json)
    {
        $input = json_decode($json);
        $this->bin = $input->bin;
        $this->amount = $input->amount;
        $this->currency = $input->currency;
    }

    public function getBin()
    {
        return $this->bin;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getCurrency()
    {
        return $this->currency;
    }
}
