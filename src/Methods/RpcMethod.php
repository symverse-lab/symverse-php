<?php

namespace Symverse\Methods;

use Graze\GuzzleHttp\JsonRpc\ClientInterface;
use Graze\GuzzleHttp\JsonRpc\Exception\RequestException;
use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use HttpResponseException;

abstract class RpcMethod
{
    static protected $defaultRpcId = 67;

    protected $prefix;

    protected $client;

    public function __construct(clientInterface $client)
    {
        $this->client = $client;
    }

    final public function send(string $method, array $params = []): ResponseInterface {
        foreach($params as $key => $param){
            if(is_object($param)){
                $params[$key] = $param->toString();
            }
        }

        $request = $this->client->request(self::$defaultRpcId, $this->prefix.'_'.$method, $params);
        $response = $this->client->send(
            $this->client->request(self::$defaultRpcId, $this->prefix.'_'.$method, $params)
        );
        if ($response->getRpcErrorCode() < 0) {
            throw new RequestException($response->getRpcErrorMessage(), $request, $response );
        }
        return $response;
    }

}