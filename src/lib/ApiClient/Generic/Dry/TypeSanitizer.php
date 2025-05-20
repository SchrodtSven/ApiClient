<?php declare(strict_types=1);
/**
 * Class transforming, casting, guessing between types
 * 
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-27
 * @link https://github.com/SchrodtSven/ApiClient
 */
namespace SchrodtSven\ApiClient\Generic\Dry;
use SchrodtSven\ApiClient\Type\StringClass;

class TypeSanitizer
{
    public function stringClassyMe(\Stringable | string $me): StringClass
    {
        return ($me instanceof StringClass) ? $me
            : new StringClass((string) $me);
    }
}