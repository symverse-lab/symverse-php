<?php

namespace Symverse\Methods;

use Symverse\Utils\Hex;

class Web3 extends RpcMethod
{
    public $prefix = 'web3';

    function clientVersion(){
        return $this->send("clientVersion", []);
    }

    function sha3(string $text){
        return $this->send("sha3", [Hex::preHex($text)]);
    }
}