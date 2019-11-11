<?php
namespace Symverse\Utils;

/**
 * Convert from and to sym Sym
 *
 * Defaults from wei to ether.
 *
 * @param float $amount
 * @param string $from
 * @param string $to
 * @throws \Exception
 *
 * @return float
 */
function convertCurrency(float $amount, string $from = 'hug', string $to = 'sym') {

    // relative to Sym
    $convertTabe = [
        'hug' => 1000000000000000000,
        // Kwei, Ada, Femtoether
        'khug' => 1000000000000000,
        // Mwei, Babbage, Picoether
        'mhug' => 1000000000000,
        // Gwei, Shannon, Nanoether, Nano
        'ghug' => 1000000000,
        // Szabo, Microether,Micro
        'microsym' => 1000000,
        // millisym, milli
        'millisym' => 1000,
        'sym' => 1,
        // Kether, Grand,Einstein
        'ksym' => 0.001,
        // Kether, Grand,Einstein
        'msym' => 0.000001,
        'gsym' => 0.000000001,
        'tsym' => 0.000000000001,
    ];
    if (!isset($convertTabe[$from])) {
        throw new \Exception('Inknown currency to convert from "' . $from . '"');
    }
    if (!isset($convertTabe[$to])) {
        throw new \Exception('Inknown currency to convert to "' . $to . '"');
    }
    return $convertTabe[$to] * $amount / $convertTabe[$from];
}