<?php
require __DIR__ . '/vendor/autoload.php';

use App\Transaction;
use App\Bin;
use App\Rate;
use App\Amount;

foreach (explode("\n", file_get_contents($argv[1])) as $row) {
    if (empty($row)) break;

    $transaction = new Transaction($row);
    $bin         = new Bin($transaction->getBin());
    $rate        = new Rate($transaction->getCurrency());
    $amount      = new Amount($transaction->getCurrency(), $transaction->getAmount(), $rate->getValue(), $bin->getCountry()->isEu());
    echo $amount->getValue() . "\n";
}