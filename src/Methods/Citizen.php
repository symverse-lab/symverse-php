<?php

namespace Symverse\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use Symverse\DataType\BlockHash;
use Symverse\DataType\BlockNumber;
use Symverse\DataType\BytesData;
use Symverse\DataType\SymId;
use Symverse\DataType\Transaction;

class Citizen extends RpcMethod
{
    public $prefix = 'citizen';

    function blockNumber():ResponseInterface{
        return $this->send(__FUNCTION__, func_get_args());
    }

    //TODO: 개발 필요
    function sendCitizen($oracle):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    //TODO: 개발 필요
    function sendRawCitizen(BytesData $raw):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getCitizenByHash(BlockHash $hash):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getRawCitizenByHash(BlockHash $hash):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getCitizenBySymID(SymId $symId, BlockNumber $number):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getRawCitizenBySymID(SymId $symId, BlockNumber $number):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getCitizensByBlockNumber(BlockNumber $number):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getCitizenCount(BlockNumber $number):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function pendingCitizens():ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockByHash(BlockHash $hash, bool $switch = false):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockByNumber(BlockNumber $number, bool $switch = false):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockCitizenCountByHash(BlockHash $hash):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockCitizenCountByNumber(BlockNumber $number):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }
}