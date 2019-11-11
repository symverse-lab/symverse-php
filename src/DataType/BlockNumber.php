<?php

namespace Symverse\DataType;

use Symverse\Utils\Hex;

define('LATEST', 'latest');
define('EARLIEST', 'earliest');
define('PENDING', 'pending');

class BlockNumber
{
    public $number;

    public function __construct(string $number = 'latest')
    {
        if (Hex::isHex($number)){

        }else{
            if (is_numeric($number)) {
                $number = Hex::preHex(dechex($number));
            } else {
                if (!in_array($number, ['latest', 'earliest', 'pending'])) {
                    throw new \InvalidArgumentException('wrong BlockNumber');
                }
            }
        }

        $this->number = $number;
    }

    public function __toString()
    {
        return $this->number;
    }
    public function toString()
    {
        return $this->number;
    }
}