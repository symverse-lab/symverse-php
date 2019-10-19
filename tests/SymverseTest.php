<?php

use bb\Sha3\Sha3;
use PHPUnit\Framework\TestCase;
use Symverse\Symverse;

final class SymverseTest extends TestCase
{
    public function testSha3(): void {
       $a = Sha3::hash('a', 256);
       $this->assertStringContainsString("", $a, "야호");
    }
}
