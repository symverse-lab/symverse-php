<?php
/**
 * Created by PhpStorm.
 * User: symverse_silee
 * Date: 11/11/2019
 * Time: 12:24 PM
 */

namespace Symverse\DataType;

use Symverse\Utils\Hex;

class SymId{

    private $symId;

    public function __construct(string $symId)
    {
        if ($symId !== Hex::isHex($symId)){
            if (is_numeric($symId)){
                $symId = dechex($symId);
            }
            $symId = Hex::preHex($symId);
        }

        if (strlen($symId) !== 22) {
            throw new \LengthException($symId.' is not valid.');
        }
        $this->symId = $symId;
    }
    public function __toString()
    {
        return $this->symId;
    }
    public function toString()
    {
        return $this->symId;
    }
}