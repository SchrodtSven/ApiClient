<?php declare(strict_types=1);
/**
 * Matching data type (name(s))
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-11
 * @link https://github.com/SchrodtSven/ApiClient
 */
namespace SchrodtSven\PHalfAsleep\CodeCreator\Php\Type;



class Matcher
{


    public function numberToBoolLiteral(int|float $number): bool
    {
        return match($number) {
            0 => false,
            1 => true,
            default => $number
        };
    } 

    public function toNativeType(string $type): string
    {
        return match(strtolower($type)) {
            null  => 'null',
            'bool', 'boolean' => 'bool',
            'integer', 'int' => 'int',
            'double', 'real', 'float' => 'float',
            'char', 'varchar', 'nvarchar', 
            'text', 'longtext', 'string' => 'string', // TODO add more on left side!!
            default => $type
        };
    }
}