<?php
namespace Symverse\DataType;

class Transaction
{
    private $from;
    private $nonce;
    private $gasPrice;
    private $gas;
    private $to;
    private $value;
    private $data;
    private $type;
    private $workNodes;
    private $extraData;

    /**
     * Transaction constructor.
     * @param SymId $from
     * @param SymId $to
     * @param string|null $data
     * @param int|null $gas
     * @param int $gasPrice
     * @param int|string|null $value
     * @param int|null $nonce
     * @param int|null $type
     * @param int|null $workNodes
     * @param int|null $extraData
     */
    public function __construct(
        SymId $from,
        SymId $to,
        string $data = null,
        int $gas = null,
        int $gasPrice = null,
        int $value = null,
        int $nonce = null,
        int $type = null,
        int $workNodes = null,
        int $extraData = null
    ) {
        $this->from = $from;
        $this->to = $to;
        $this->data = $data;
        $this->gas = $gas;
        $this->gasPrice = $gasPrice;
        $this->value = $value;
        $this->nonce = $nonce;
        $this->type = $type;
        $this->workNodes = $workNodes;
        $this->extraData = $extraData;
    }
    public function toArray(): array
    {
        $transaction = [
            'from' => $this->from->toString(),
            'to' => $this->to->toString(),
        ];
        if (!is_null($this->data)) {
            $transaction['data'] = '0x'.dechex($this->data);
        }
        if (!is_null($this->gas)) {
            $transaction['gas'] = '0x'.dechex($this->gas);
        }
        if (!is_null($this->gasPrice)) {
            $transaction['gasPrice'] = '0x'.dechex($this->gasPrice);
        }
        if (!is_null($this->value)) {
            $transaction['value'] = '0x'.dechex($this->value);
        }
        if (!is_null($this->nonce)) {
            $transaction['nonce'] = '0x'.dechex($this->nonce);
        }

        if (!is_null($this->type)) {
            $transaction['$this'] = '0x'.dechex($this->$$this);
        }


        return $transaction;
    }
}