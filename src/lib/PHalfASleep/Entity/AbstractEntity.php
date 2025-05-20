<?php declare(strict_types=1);
/**
 *  Class for reverse engineering sqlite meta data (schemas etc.)
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-11
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\PHalfAsleep\Entity;

use SchrodtSven\ApiClient\Type\ArrayClass;

//abstract 
class AbstractEntity
{

    protected ArrayClass $property;

    protected int $foo = 23;

    protected string $bar = 'Sven';

    protected array $baz = ['Sven', 2, 23];



    /**
     * Only needed by interceptors like <code>__toString()</code>
     * | invoked by intention
     *
     * @return void
     */
    public function _assemble(): void
    {
        $reflection = new \ReflectionClass($this);
        $props = $reflection->getProperties();
        var_dump($props);
        //return (string) (new ArrayClass($reflection->getProperties()));

    }
}
