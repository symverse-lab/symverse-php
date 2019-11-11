<?php

namespace Symverse\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use Symverse\DataType\BlockHash;
use Symverse\DataType\BlockNumber;
use Symverse\DataType\BytesData;
use Symverse\DataType\SymId;
use Symverse\DataType\Transaction;

class Warrant extends RpcMethod
{
    public $prefix = 'warrant';

    function blockNumber():ResponseInterface{
        return $this->send(__FUNCTION__, func_get_args());
    }


    function getWarrantsByBlockHash(BlockHash $hash):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getWarrantsByBlockNumber(BlockNumber $blockNumber):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockByHash(BlockHash $hash, bool $switch = false):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockByNumber(BlockNumber $blockNumber, bool $switch = false):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }
}