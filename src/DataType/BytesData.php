<?php

namespace Symverse\DataType;

use Symverse\Utils\Hex;

class BytesData{

    private $bytes;

    public function __construct(string $bytes)
    {
        if ($bytes !== Hex::isHex($bytes)){
            if (is_numeric($bytes)){
                $bytes = dechex($bytes);
            }else{
                $bytes = bin2hex($bytes);
            }
            $bytes = Hex::preHex($bytes);
        }
        $this->bytes = $bytes;
    }
    public function __toString()
    {
        return $this->bytes;
    }
    public function toString()
    {
        return $this->bytes;
    }
}