<?php

use PHPUnit\Framework\TestCase;
use Symverse\DataType\BlockNumber;
use Symverse\DataType\SymId;
use Symverse\SymverseClinet;

final class SymverseTest extends TestCase {

    public function testBlockNumber(): void {

        $client = new SymverseClinet("http://58.227.193.172:8545");
        $result = $client->sym()->blockNumber()->getRpcResult();
        echo $result;
        $this->assertNotEmpty($result);
    }

    public function testGetBlockByNumber(): void {

        $client = new SymverseClinet("http://58.227.193.172:8545");
        $result = $client->sym()->getBlockByNumber(new BlockNumber(1), true)->getRpcResult();
        $this->assertNotEmpty($result);
    }


    public function testGetBalance(): void {

        $client = new SymverseClinet("http://58.227.193.172:8545");
        $result = $client->sym()->getBalance(new SymId("0x00021000000000010002"), new BlockNumber())->getRpcResult();
        echo $result;
        $this->assertNotEmpty($result);
    }



}
