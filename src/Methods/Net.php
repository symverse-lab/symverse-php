<?php

namespace Symverse\Methods;

class Net extends RpcMethod
{
    public $prefix = 'net';

    function version(){
        return $this->send('version');
    }

    function listening(){
        return $this->send('listening');
    }

    function peerCount(){
        return $this->send('peerCount');
    }
}