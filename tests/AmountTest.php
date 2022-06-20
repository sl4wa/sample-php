<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use App\Transaction;
use App\Bin;
use App\Rate;
use App\Amount;

final class AmountTest extends TestCase
{
    public function testFixedAmount(): void
    {
        $stub = $this->createStub(Rate::class);
        $stub->method('getValue')
            ->willReturn('1.053463'); // In case rate changes

        $transaction = new Transaction('{"bin":"516793","amount":"50.00","currency":"USD"}');
        $bin         = new Bin($transaction->getBin());
        $rate        = new Rate($transaction->getCurrency());
        $amount      = new Amount($transaction->getCurrency(), $transaction->getAmount(), $rate->getValue(), $bin->getCountry()->isEu());

        $this->assertEquals(
            '0.48',
            $amount->getValue()
        );
    }
}
