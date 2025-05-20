<?php declare(strict_types=1);
/**
 * Simple parser for given data structures
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-17
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Text\Parser;
use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\ApiClient\Text\Parser\Entity\PhpType;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Type\Matcher;

class  PhpData
{   
    private PhpType $type;

    

    public function __construct(private mixed $raw = null)
    {
        $this->type= new PhpType;

        $this->type->setType((new Matcher)->toNativeType(gettype($raw))); 

        if($this->type->getType() ==='object')
                        $this->type->setClass($raw::class);


    }

    




    /**
     * Get the value of raw
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * Set the value of raw
     */
    public function setRaw($raw): self
    {
        $this->raw = $raw;

        return $this;
    }
}