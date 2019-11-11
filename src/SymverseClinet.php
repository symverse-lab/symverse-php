<?php
namespace Symverse;

use Ethereum\Ethereum;
use Graze\GuzzleHttp\JsonRpc\Client;
use Symverse\Methods\Citizen;
use Symverse\Methods\Net;
use Symverse\Methods\Oracle;
use Symverse\Methods\Sym;
use Symverse\Methods\Warrant;
use Symverse\Methods\Web3;

class SymverseClinet  {

    private $client;
    private $methods = [];

    public function __construct(string $url)
    {
        $this->client = Client::factory($url);
        $this->methods = [
            'net' => new Net($this->client),
            'sym' => new Sym($this->client),
            'web3' => new Web3($this->client),
            'citizen' => new Citizen($this->client),
            'warrant' => new Warrant($this->client),
            'oracle' => new Oracle($this->client),
        ];
    }

    public function net(): Net
    {
        return $this->methods['net'];
    }
    public function web3(): Web3
    {
        return $this->methods['web3'];
    }
    public function sym(): Sym
    {
        return $this->methods['sym'];
    }
    public function citizen(): Citizen
    {
        return $this->methods['citizen'];
    }
    public function warrant(): Warrant
    {
        return $this->methods['warrant'];
    }
    public function oracle(): Oracle
    {
        return $this->methods['oracle'];
    }

}