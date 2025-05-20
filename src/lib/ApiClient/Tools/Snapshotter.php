<?php declare(strict_types=1);
/**
 * Recording working steps - to be used by iterators, worker bees etc.
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-16
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Tools;

use SchrodtSven\ApiClient\Type\ArrayClass;

class Snapshotter implements SnapshotterInterface
{
    public function __construct(private ?ArrayClass $steps = null)
    {
        if(is_null($this->steps)) 
                        $this->steps = new ArrayClass();
    }

    public function start(): self
    {
        return $this;
    }

    public function push(mixed $step): self
    {
        $this->steps->push($step);
        return $this;
    }

    public function end(): ArrayClass
    {
        return $this->steps;
    }

    public function flush(): self
    {
        $this->steps = new ArrayClass();
        return $this;
    }
}