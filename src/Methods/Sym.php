<?php

namespace Symverse\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use Symverse\DataType\BlockHash;
use Symverse\DataType\BlockNumber;
use Symverse\DataType\BytesData;
use Symverse\DataType\SymId;
use Symverse\DataType\Transaction;

class Sym extends RpcMethod
{
    public $prefix = 'sym';

    function protocolVersion():ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function syncing():ResponseInterface{
        return $this->send(__FUNCTION__, func_get_args());
    }

    function symbase(SymId $symId):ResponseInterface{
        return $this->send(__FUNCTION__, func_get_args());
    }

    function accounts():ResponseInterface{
        return $this->send(__FUNCTION__, func_get_args());
    }

    function blockNumber():ResponseInterface{
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBalance(SymId $symId, BlockNumber $blockNumber):ResponseInterface{
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getTransactionCount(SymId $symId, BlockNumber $blockNumber):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockTransactionCountByHash(BlockHash $blockNumber):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockTransactionCountByNumber(BlockNumber $blockNumber):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getCode(SymId $symId, BlockNumber $blockNumber):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function sign(SymId $symId, BytesData $bytesData):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function sendTransaction(Transaction $symId, BlockNumber $blockNumber):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function sendRawTransaction(BytesData $bytesData):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }


    function call(BytesData $bytesData):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockByHash(BytesData $bytesData, bool $switch = false):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getBlockByNumber(BlockNumber $blockNumber, bool $switch = false):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getTransactionByHash(BlockHash $hash, bool $switch = false):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getTransactionByBlockHashAndIndex(BlockHash $hash, BlockNumber $position ):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getTransactionByBlockNumberAndIndex(BlockNumber $blockNumber, BytesData $index):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getTransactionReceipt(BlockHash $hash):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getDeposit(SymId $smId):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function setDeposit(SymId $smId, BytesData $deposit):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function restoreDeposit(SymId $smId):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }
}