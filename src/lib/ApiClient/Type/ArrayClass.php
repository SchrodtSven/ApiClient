<?php declare(strict_types=1);
/*
 * Class representing arrays as instances
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-09
 */

namespace SchrodtSven\ApiClient\Type;
use SchrodtSven\ApiClient\Type\Dry\ArrayAccessTrait;
use SchrodtSven\ApiClient\Type\Dry\IteratorTrait;
use SchrodtSven\ApiClient\Type\Dry\StackOperationTrait;
use SchrodtSven\ApiClient\Type\Dry\ClosureOperationTrait;
use SchrodtSven\ApiClient\Type\Dry\ArrayTransformerTrait;
use Stringable;

class ArrayClass implements \ArrayAccess, \Iterator, \Countable
{
    use ArrayAccessTrait;   
    use IteratorTrait;
    use ClosureOperationTrait;
    use ArrayTransformerTrait;
    use StackOperationTrait;
    
    public function __construct(private array $content = [])
    {
        
    }

    public function count(): int
    {   
        return count($this->content);
    }

    public function keys(): self
    {
        return new self(array_keys($this->content));
    }

    public function hasKey(string $key): bool
    {
        return array_key_exists($key, $this->content);
    }

    public function join(string $glue = ', ') : StringClass 
    {
        return new StringClass(implode($glue, $this->content));    
    }


    public function cutColumn(string|Stringable $colName): self
    {

        return new self(array_column($this->content, $colName));
    }

    /**
     * Interceptor for usage in string context
     *
     * @param string $mode
     * @return Stringable
     */
    public function __toString(): string
    {
        return (string) $this->join();
    }

    public function trim(): self
    {
        if(empty($this->content[0])) {
            $this->shift();
        }
        if(empty($this->content[$this->count()-1])) {
            $this->pop();
        }
        return $this;
    }
}