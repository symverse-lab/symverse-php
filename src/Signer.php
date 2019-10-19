<?php
namespace Symverse;

class Signer {

    private $network;

    public function __construct(string $network)
    {
        $this->network = $network;
    }

}