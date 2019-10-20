<?php
namespace Symverse;

use BitWasp\Buffertools\Buffer;
use Ethereum\RLP\Rlp;
use kornrunner\Secp256k1;

class RawTransaction {

    protected $from;
    protected $nonce;
    protected $gasPrice;
    protected $gasLimit;
    protected $to;
    protected $value;
    protected $input;
    protected $type;
    protected $workNodes;
    protected $extraData;

    /**
     * @var String|null $v
     */
    protected $v;
    /**
     * @var String|null $r
     */
    protected $r;
    /**
     * @var String|null $s
     */
    protected $s;

    /**
     * TransactionRaw constructor.
     * @param string $from
     * @param string $nonce
     * @param string $gasPrice
     * @param string $gasLimit
     * @param string $to
     * @param string $value
     * @param string $input
     * @param string $type
     * @param string $workNodes
     * @param string $extraData
     */
    public function __construct(string $from, string $nonce, string $gasPrice, string $gasLimit, string $to, string $value, string $input, string $type, string $workNodes, string $extraData)
    {
        $this->from = $from;
        $this->nonce = $nonce;
        $this->gasPrice = $gasPrice;
        $this->gasLimit = $gasLimit;
        $this->to = $to;
        $this->value = $value;
        $this->input = $input;
        $this->type = $type;
        $this->workNodes = $workNodes;
        $this->extraData = $extraData;
    }

    public function getRaw(string $privateKey, int $chainId = 0): string {
        if ($chainId < 0) {
            throw new \RuntimeException('ChainID must be positive');
        }
        $this->v = '';
        $this->r = '';
        $this->s = '';
        if (strlen($privateKey) != 64) {
            throw new \RuntimeException('Incorrect private key');
        }
        $this->sign($privateKey, $chainId);
        return $this->serialize();
    }

    private function serialize(): string {
        return $this->RLPencode($this->getList());
    }


    private function sign(string $privateKey, int $chainId): void {
        $hash      = $this->hash($chainId);
        $secp256k1 = new Secp256k1();

        /**
         * @var Signature
         */
        $signed    = $secp256k1->sign($hash, $privateKey);
        $this->r   = $this->hexup(gmp_strval($signed->getR(), 16));
        $this->s   = $this->hexup(gmp_strval($signed->getS(), 16));
        $this->v   = dechex ((int) $signed->getRecoveryParam());
    }

    private function hash(int $chainId): string {
        $input = $this->getList();
        if ($chainId > 0) {
            $input['v'] = $chainId;
            $input['r'] = '';
            $input['s'] = '';
        } else {
            unset($input['v']);
            unset($input['r']);
            unset($input['s']);
        }
        $encoded = $this->RLPencode($input);
        return Hash::hash(hex2bin($encoded));
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getList(): array
    {
        return [
             "from" => $this->from,
             "nonce" => $this->nonce,
             "gasPrice" => $this->gasPrice,
             "gasLimit" => $this->gasLimit,
             "to" => $this->to,
             "value" => $this->value,
             "input" => $this->input,
             "workNodes" => $this->workNodes,
             "extraData" => $this->extraData,
             "v" => $this->v,
             "r" => $this->r,
             "s" => $this->s,
        ];
    }

    private function RlpEncode(array $input): string {
        $rlp  = new RLP;
        $data = [];
        foreach ($input as $item) {
            $value  = strpos ($item, '0x') !== false ? substr ($item, strlen ('0x')) : $item;
            $data[] = $value ? '0x' . $this->hexup($value) : '';
        }
        return $rlp->encode($data)->toString('hex');
    }

    private function hexup(string $value): string {
        return strlen ($value) % 2 === 0 ? $value : "0{$value}";
    }

    /**
     * @param Buffer $privateKey
     * @param Buffer $chainId (1 => mainet, 3 => robsten, 4 => rinkeby)
     * @return Buffer
     * @throws \Exception
     */
    public function signedTxRlp(Buffer $privateKey, Buffer $chainId = null): Buffer
    {
        $chainId = $chainId ?? Buffer::int('1');
        $this->v = new Buffer();
        $this->r = new Buffer();
        $this->s = new Buffer();
        return $this->sign($privateKey, $chainId);
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * @return mixed
     */
    public function getGasPrice()
    {
        return $this->gasPrice;
    }

    /**
     * @return mixed
     */
    public function getGasLimit()
    {
        return $this->gasLimit;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getWorkNodes()
    {
        return $this->workNodes;
    }

    /**
     * @return mixed
     */
    public function getExtraData()
    {
        return $this->extraData;
    }



}