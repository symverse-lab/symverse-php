# Symverse-PHP  ![build](https://travis-ci.org/gocheat/symphp.svg?branch=master)
Symverse Client 전용 PHP 라이브러리입니다.


## Installation

#### Composer install
```
$ composer require symverse-lab/symverse-php
```

## Usage

- 기본적인 RPC API 호출 방

```php
$symId = new SymId('0x00021000000000010002');
$randomHash = '0xb903239f8543d04b5dc1ba6579132b143087c68db1b2168786408fcbce568238';

$client = new EthereumClient('http://localhost:8545');

// net
echo $client->net()->version() , PHP_EOL;
echo $client->net()->listening() , PHP_EOL;
echo $client->net()->peerCount() , PHP_EOL;


// web3
echo $client->web3()->clientVersion() , PHP_EOL;
echo $client->web3()->sha3('0x68656c6c6f20776f726c64') , PHP_EOL;
echo $client->sym()->protocolVersion() , PHP_EOL;
echo $client->sym()->syncing() , PHP_EOL;

// sym
$symbase = $client->sym()->symbase();
echo $client->sym()->blockNumber()->getRpcResult(), PHP_EOL;
echo $client->sym()->getBlockByNumber(new BlockNumber(1), true)->getRpcResult(), PHP_EOL;
echo $client->sym()->getBalance($symId)->getRpcResult(), PHP_EOL;

//other method ( warrant, citizen, oracle )
$client->warrant()-> ...
$client->citizen()-> ...
$client->oracle()-> ...

````

- Transaction Raw 생성

```php
use Symverse\RawTransaction;
use Web3p\RLP\RLP;

//private key
$pk = "21d152de383fb069331126868f315a28b5fc21ed725a19a421146c0c08a87a4e";
$chainId = 25

$from = "0x00021000000000010002";
$nonce = "15";
$gasPrice = "0x03f5476a00";
$gasLimit = "0x027f4b";
$to = "0x00021000000000020002";
$value = "0x155";
$input = "";
$type = "0x0";
$workNodes = ["0x00021000000000010002"];
$extra = "";

$tx = new RawTransaction($from, $nonce, $gasPrice, $gasLimit, $to, $value, $input, $type, $workNodes, $extra);
$raw = $tx->getRaw($pk, $chainId);
// f8768a00021000000000010002158503f5476a0083027f4b8a000210000000000200028201550000cb8a000210000000000100028080a0fac134101fb8f08083af38e59f3abee958c869e0fed9314d2a609c862427f131a02c91acea0ab6ba4d09e65a371706c986f4844ac3d047d6dd27e321c2424c6a0b
````

- SCT Transaction Raw 생성

```php
use Symverse\RawTransaction;
use Web3p\RLP\RLP;

$rlp = new RLP();

//private key
$pk = "7eb1003bf3378e3c177d3db67a6591d3c1af101a53de800ede23d147ecf0d698";
$chainId = 25

$from = "0x00021000000000010002";
$nonce = "0x0";
$gasPrice = "0x03f5476a00";
$gasLimit = "0x027f4b";
$to = "";
$value = "0x";
$input = (new Sct(20, 0, new SctParameter("TestToken",  "TXT", "0x55", "0x00021000000000010002")))->getInput();
$type = "0x1";
$workNodes = ["0x00021000000000010002"];
$extra = "";

$tx = new RawTransaction($from, $nonce, $gasPrice, $gasLimit, $to, $value, $input, $type, $workNodes, $extra);
$raw = $tx->getRaw($pk, $chainId);
// f8888a00021000000000010002018503f5476a0083027f4b80809edd1480da8954657374546f6b656e83545854558a0002100000000001000201cb8a000210000000000100028001a00a2d5346b66815f89c984cdafa23296b3e5f382e04d98116de07141526abefffa052065e0298d8f7be16c339694aab2b177fcdd83c7f8d2dced2fb40cfe5320f44
```

