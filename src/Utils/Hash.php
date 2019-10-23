<?php
namespace Symverse\Utils;

use bb\Sha3\Sha3;

class Hash {

    public static function Hash($text) {
        return Sha3::hash($text, 256);
    }
}