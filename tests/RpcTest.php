<?php

use PHPUnit\Framework\TestCase;
use Symverse\DataType\BlockNumber;
use Symverse\RawTransaction;
use Symverse\Sct\Sct;
use Symverse\Sct\SctParameter;
use Symverse\SymverseClinet;

final class SymverseTest extends TestCase {

    public function testSignRawTransaction(): void {

        $client = new SymverseClinet("http://58.227.193.172:8545");
        $result = $client->sym()->getBlockByNumber(new BlockNumber(1), true)->getRpcResult();
        var_dump($result);
        $this->assertNotEmpty($result);
    }

    public function testSignSCT20RawTransaction(): void {

        $pk = "7eb1003bf3378e3c177d3db67a6591d3c1af101a53de800ede23d147ecf0d698";
        $from = "0x00021000000000010002";
        $nonce = "0x0";
        $gasPrice = "0x03f5476a00";
        $gasLimit = "0x027f4b";
        $to = "";
        $value = "0x";
        $input = (new Sct(20, 0, new SctParameter("TestToken",  "TXT", "0x55", "0x00021000000000010002")))->getInput();
        $type = "0x1";
        $workNodes = ["0x00021000000000010002"];
        $extra = "";

        $tx = new RawTransaction($from, $nonce, $gasPrice, $gasLimit, $to, $value, $input, $type, $workNodes, $extra);
        $message = $tx->getRaw($pk, 25);

        print_r($message);
        $this->assertNotEmpty($message);
    }
}
