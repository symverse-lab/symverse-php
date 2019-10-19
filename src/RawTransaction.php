<?php
namespace Symverse;

class RawTransaction {

    private $from;
    private $nonce;
    private $gasPrice;
    private $gasLimit;
    private $to;
    private $value;
    private $input;
    private $type;
    private $workNodes;
    private $extraData;

    /**
     * TransactionRaw constructor.
     * @param $from
     * @param $nonce
     * @param $gasPrice
     * @param $gasLimit
     * @param $to
     * @param $value
     * @param $input
     * @param $type
     * @param $workNodes
     * @param $extraData
     */
    public function __construct($from, $nonce, $gasPrice, $gasLimit, $to, $value, $input, $type, $workNodes, $extraData)
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