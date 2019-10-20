<?php

use bb\Sha3\Sha3;
use BitWasp\Buffertools\Buffer;
use PHPUnit\Framework\TestCase;
use Symverse\RawTransaction;

final class SymverseTest extends TestCase
{
    public function testSha3(): void {
       $a = Sha3::hash('a', 256);
       $this->assertStringContainsString("", $a, "야호");
    }

    public function testSignRawTransaction(): void {

    }
}
