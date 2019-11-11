<?php

namespace Symverse\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use Symverse\DataType\BlockHash;
use Symverse\DataType\BlockNumber;
use Symverse\DataType\BytesData;
use Symverse\DataType\SymId;
use Symverse\DataType\Transaction;
use Web3p\RLP\RLP;

class Oracle extends RpcMethod
{
    public $prefix = 'oracle';

    function blockNumber():ResponseInterface{
        return $this->send(__FUNCTION__, func_get_args());
    }

    //TODO: 개발 필요
//    function sendOracle($oracle):ResponseInterface {
//        return $this->send(__FUNCTION__, func_get_args());
//    }

    //TODO: 개발 필요
//    function sendRawOracle(BytesData $raw):ResponseInterface {
//        return $this->send(__FUNCTION__, func_get_args());
//    }

    function sendOracleJSON(SymId $symId, $jsonString):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getOracleByHash(BlockHash $hash):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getRawOracleByHash(BlockHash $hash):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getOracleCount(SymId $symId, BlockNumber $number):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function pendingOracles():ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockByHash(BlockHash $hash, bool $switch = false):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockByNumber(BlockNumber $number, bool $switch = false):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

}