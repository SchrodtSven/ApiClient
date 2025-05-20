<?php
/**
 * Trait managing transformation of array elements
 * 
 * Providing possibility of accessing objects as arrays
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-26
 */

namespace SchrodtSven\ApiClient\Type\Dry;

use SchrodtSven\ApiClient\Type\StringClass;

trait ArrayTransformerTrait
{
    /**
     * Converting each member of self::$content to an inanstance of StringClass
     *
     * @param boolean $autoTrim
     * @return self
     */
    public function toStringClass(bool $autoTrim = true): self
    {
        $this->walk(function(& $item) use($autoTrim) {
            $item = new StringClass((string) $item);
            if($autoTrim) $item->trim();
            
        });
        
        return $this;
    }    
}