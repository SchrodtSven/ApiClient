<?php declare(strict_types=1);
/**
 * Class for parsing Comic vine's API result data (json | xml)
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-15
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\App\Provider\ComicVine;

use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\ApiClient\Stor\Driver\Sqlite;
use SchrodtSven\ApiClient\App\Provider\ComicVine\Query as ComicVinelQuery;

class Parser
{
    private object $rawPhpData;

    private ArrayClass $firstLevelKeys;

    private array $matchName;

    private ArrayClass $nameToType;

    public function __construct(string $rawJson)
    {
        $this->rawPhpData = json_decode(($rawJson));
        // var_dump($this->rawPhpData);die;
    }

    /**
     * Get the value of rawPhpData
     *
     * @return string
     */
    public function getRawPhpData(): object
    {
        return $this->rawPhpData;
    }

    /**
     * Set the value of rawPhpData
     *
     * @param string $rawPhpData
     *
     * @return self
     */
    public function setRawPhpData(mixed $rawPhpData): self
    {
        $this->rawPhpData = $rawPhpData;

        return $this;
    }


    public function parseResults(): array
    {
        return $this->rawPhpData->results;
    }

    public function getFirstLevelKeys(): ArrayClass
    {
        if(is_null($this->rawPhpData)) {
            return new ArrayClass();
        }  else {
            return new ArrayClass(
                array_keys(get_object_vars($this->rawPhpData))                
            );
        }      
    }
}
