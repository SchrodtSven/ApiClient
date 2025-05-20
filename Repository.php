<?php declare(strict_types=1);
/**
 *  Repository class for retrieving cached entities of marvel.com API
 *  from rel. data bases
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-05-20
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace  SchrodtSven\ApiClient\Entity\Marvel;
use SchrodtSven\ApiClient\Stor\Driver\Sqlite;
use SchrodtSven\ApiClient\Stor\Driver\DriverInterface;
use SebastianBergmann\CodeCoverage\Driver\Driver;
use SchrodtSven\ApiClient\Entity\Marvel\Character;
use SchrodtSven\ApiClient\Stor\Query\Marvel as MarvelQuery;

class Repository
{
    public function __construct(private DriverInterface $driver)
    {
        
    }

    public function getCharacterById(int $id): Character
    {
        return $this->driver->prepare(sprintf(MarvelQuery::CHARACTER_GET_BY_GENERIC, 'id'))
                             ->execute(['value' => $id])
                             ->fetchAll('SchrodtSven\ApiClient\Entity\Marvel\Character')[0];
    }
}