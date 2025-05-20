<?php  declare(strict_types=1);
/**
 * Trait for classes implementing operations on array with closures (or callbacks)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-10
 */

namespace SchrodtSven\ApiClient\Type\Dry;

trait ClosureOperationTrait
{
     /**
      * 
      *
      * @param \Closure $closure
      * @param mixed $arg
      * @return self
      */   
    public function walk(\Closure $closure, mixed $arg = null): self
    {
        array_walk($this->content, $closure, $arg);
        return $this;
        
    }
   
    
}