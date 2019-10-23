<?php


namespace Symverse\Utils;

class Hex
{
    /**
     * @param string $hex
     * @return string
     */
    static function trim(string $hex): string
    {
        while (substr($hex, 0, 2) === "00") {
            $hex = substr($hex, 2);
        }
        return $hex;
    }

    /**
     * @param string $hex
     * @return string
     */
    static function cleanPrefix(string $hex): string
    {
        if(Hex::isHex($hex)) {
            return substr($hex, 2);
        }
        return $hex;
    }

    /**
     * @param string $value
     * @return string
     */
    static function hexup(string $value): string {
        return strlen ($value) % 2 === 0 ? $value : "0{$value}";
    }

    /**
     * @param string $value
     * @return string
     */
    static function preHex(string $value): string {
        return !Hex::isHex($value) ? "0x{$value}" : $value;
    }

    /**
     * @param string $value
     * @return bool
     */
    static function isHex(string $value) : bool {
        return substr($value,0,2) === '0x';
    }


}