<?php declare(strict_types=1);
/**
 * Trait regex (PCRE) based (string) operations
 * 
 * @see https://www.php.net/manual/en/book.pcre.php
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-24
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Type\Dry;
use SchrodtSven\ApiClient\Type\ArrayClass;

trait RegExTrait
{

    public const WHITESPACE = '/\s+/';
    public const UPPER_ALPHA = '/(?=[A-Z])/';

    /**
     * Splitting string at substrings being only white space
     *
     * @param string $pattern
     * @param int $limit
     * @param int $flags
     * @return ArrayClass
     */
    public function splitByRegEx(string $pattern, int $limit = -1, int $flags = \PREG_SPLIT_NO_EMPTY): ArrayClass
    {
        return new ArrayClass(preg_split($pattern, $this->content, $limit, $flags));
    }

    /**
     * Splitting string at Uppercased substrings
     *
     * @param int $limit
     * @param int $flags
     * @return ArrayClass
     */
    public function splitAtUpperCasedSubstring(int $limit = -1, int $flags = \PREG_SPLIT_NO_EMPTY): ArrayClass
    {
        return new ArrayClass(preg_split(self::UPPER_ALPHA, $this->content, $limit, $flags));
    }


    

}