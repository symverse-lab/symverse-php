<?php

use PHPUnit\Framework\TestCase;
use Symverse\Hash;
use Symverse\RawTransaction;
use Web3p\RLP\RLP;

final class SymverseTest extends TestCase {
    public function testSha3(): void {
       $a = Hash::hash('a');
       $this->assertStringContainsString("", $a, "야호");
    }

    public function testSignRawTransaction(): void {

        $pk = "21d152de383fb069331126868f315a28b5fc21ed725a19a421146c0c08a87a4e";

        $from = "0x00021000000000010002";
        $nonce = "15";
        $gasPrice = "0x03f5476a00";
        $gasLimit = "0x027f4b";
        $to = "0x00021000000000020002";
        $value = "0x155";
        $input = "";
        $type = "0x0";
        $workNodes = ["0x00021000000000010002"];
        $extra = "";


        $tx = new RawTransaction($from, $nonce, $gasPrice, $gasLimit, $to, $value, $input, $type, $workNodes, $extra);
        $message = $tx->getRaw($pk, 25);

        print_r("/////");

        print_r((15));
    }

    public function testSignSCT20RawTransaction(): void {

        $rlp = new RLP();

        $pk = "7eb1003bf3378e3c177d3db67a6591d3c1af101a53de800ede23d147ecf0d698";

        $from = "0x00021000000000010002";
        $nonce = "0xf";
        $gasPrice = "0x03f5476a00";
        $gasLimit = "0x027f4b";
        $to = "";
        $value = "0x";
        $input = $rlp->encode(["0x14", "", ["TestToken",  "TXT", "0x55", "0x00021000000000010002"]])->toString('hex');
        $type = "0x1";
        $workNodes = ["0x00021000000000010002"];
        $extra = "";


        $tx = new RawTransaction($from, $nonce, $gasPrice, $gasLimit, $to, $value, $input, $type, $workNodes, $extra);
        $message = $tx->getRaw($pk, 25);
        print_r($message);
    }
}
