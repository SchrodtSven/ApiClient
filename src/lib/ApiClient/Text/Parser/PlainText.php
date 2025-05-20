<?php declare(strict_types=1);
/**
 * Class for generic parsing of plain text input (man pages, websites, info, help etc.)
 * 
 * - converts snake_cased_names of property names to camelCasedNames 
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-16
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Text\Parser;
use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Type\Matcher;

class PlainText implements ParserInterface
{
    public const DEEFAULT_FIRST_LEVEL_SEPARATOR = '\t';

    public function __construct(private ArrayClass $content)
    {
        
    }

    public static function createFromFile(string $filename): self
    {
        try {
            return new self(new ArrayClass(file($filename)));
        } catch(\Error $error) {
            echo $error->getMessage();
        } 
    }

    public function preparseContent(string $separator = self::DEEFAULT_FIRST_LEVEL_SEPARATOR): ArrayClass
    {
        $result = new ArrayClass();
        foreach($this->content as $item) {
            $result->push(((new StringClass($item))->trim())->splitBy($separator));
        }

        return $result;
    }
    
    public static function instantiateFromFile(string $file): self
    {
        try {
            return new self(new ArrayClass(file($file)));
        } catch(\Exception $e) {
            print $e->getMessage();
        }
    }
}