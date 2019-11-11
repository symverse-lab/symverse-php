<?php

namespace Symverse\DataType;

use Symverse\Utils\Hex;

class BlockHash{

    public $hash;

    public function __construct(string $hash)
    {
        if ($hash !== Hex::isHex($hash)){
            if (is_numeric($hash)){
                $hash = dechex($hash);
            }
            $hash = Hex::preHex($hash);
        }

        if (strlen($hash) !== 66) {
            throw new \LengthException($hash.' is not valid.');
        }
        $this->hash = $hash;
    }
    public function __toString()
    {
        return $this->hash;
    }
    public function toString()
    {
        return $this->hash;
    }
}