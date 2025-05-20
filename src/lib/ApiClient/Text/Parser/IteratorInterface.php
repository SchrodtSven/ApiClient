<?php declare(strict_types=1);
/**
 * Defining public API for (parser) iterators
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-16
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Text\Parser;

interface IteratorInterface
{
    

    public function walk(): mixed;
}
