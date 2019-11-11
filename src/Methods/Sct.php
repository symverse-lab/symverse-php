<?php

namespace Symverse\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use Symverse\DataType\BlockHash;
use Symverse\DataType\BlockNumber;
use Symverse\DataType\BytesData;
use Symverse\DataType\SymId;
use Symverse\DataType\Transaction;

class Sct extends RpcMethod
{
    public $prefix = 'sct';

    function getContract(SymId $contract):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getContractAccount(SymId $contract, SymId $symId):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getAllowance(SymId $contract, SymId $owner, SymId $spender):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getContractItem(SymId $contract, BytesData $index):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }

    function getContractItemsByCategory(SymId $contract, BytesData $group):ResponseInterface {
        return $this->send(__FUNCTION__, func_get_args());
    }
}