<?php
namespace Symverse\Sct;


use Symverse\Utils\Hex;
use Web3p\RLP\RLP;

class Sct{

    private $type;
    private $method;
    private $parameter;

    public function __construct(int $type, int $method, SctParameter $parameter){
        $this->type = Hex::preHex(dechex($type));
        $this->method = hexdec(dechex($method));
        $this->parameter = $parameter;
    }

    public function getInput(){
        $rlp = new RLP();
        return Hex::preHex($rlp->encode([$this->type, $this->method, $this->parameter->get()])->toString('hex'));
    }

}