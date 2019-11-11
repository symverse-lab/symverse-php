<?php
namespace Symverse\DataType;

class CitizenTransaction
{
    private $from;
    private $to;
    private $symId;
    private $aKeyPubH;
    private $vFlag;
    private $country;
    private $status;
    private $credit;
    private $role;
    private $refCode;
    private $nonce;

    /**
     * Transaction constructor.
     * @param $from
     * @param $to
     * @param $symId
     * @param $aKeyPubH
     * @param $vFlag
     * @param $country
     * @param $status
     * @param $credit
     * @param $role
     * @param $refCode
     * @param $nonce
     */
    public function __construct($from, $to, $symId, $aKeyPubH, $vFlag, $country, $status, $credit, $role, $refCode, $nonce)
    {
        $this->from = $from;
        $this->to = $to;
        $this->symId = $symId;
        $this->aKeyPubH = $aKeyPubH;
        $this->vFlag = $vFlag;
        $this->country = $country;
        $this->status = $status;
        $this->credit = $credit;
        $this->role = $role;
        $this->refCode = $refCode;
        $this->nonce = $nonce;
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