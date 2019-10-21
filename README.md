# Symverse PHP Transaction Raw
Symverse PHP Transaction Raw 라이브러리입니다.


## Installation

#### Composer install
```
$ composer require gocheat/symverse-raw-tx
```

## Usage

1. 일반 Transaction Raw 생성

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

2. SCT Transaction Raw 생성

```php
use Symverse\RawTransaction;
use Web3p\RLP\RLP;

$rlp = new RLP();

//private key
$pk = "7eb1003bf3378e3c177d3db67a6591d3c1af101a53de800ede23d147ecf0d698";
$chainId = 25

$from = "0x00021000000000010002";
$nonce = "0x1";
$gasPrice = "0x03f5476a00";
$gasLimit = "0x027f4b";
$to = "";
$value = "0x";
$input = $rlp->encode(["0x14", "", ["TestToken",  "TXT", "0x55", "0x00021000000000010002"]])->toString('hex');
$type = "0x1";
$workNodes = ["0x00021000000000010002"];
$extra = "";

$tx = new RawTransaction($from, $nonce, $gasPrice, $gasLimit, $to, $value, $input, $type, $workNodes, $extra);
$raw = $tx->getRaw($pk, $chainId);
// f8888a00021000000000010002018503f5476a0083027f4b80809edd1480da8954657374546f6b656e83545854558a0002100000000001000201cb8a000210000000000100028001a00a2d5346b66815f89c984cdafa23296b3e5f382e04d98116de07141526abefffa052065e0298d8f7be16c339694aab2b177fcdd83c7f8d2dced2fb40cfe5320f44
```

