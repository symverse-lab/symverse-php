<?php

use PHPUnit\Framework\TestCase;
use Symverse\Symverse;

final class SymverseTest extends TestCase
{
    public function testSendRawTransaction(): void
    {
        $sym = new Symverse();
        $sym->eth_sign();
    }
}
