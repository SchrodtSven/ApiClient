<?php declare(strict_types=1);
/**
 * Interface defining public API for persistence drivers
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-09
 */

namespace SchrodtSven\ApiClient\Stor\Driver;

use SchrodtSven\ApiClient\Type\ArrayClass;

interface DriverInterface
{

    public function __construct(string $dsn = null);
    public function connect(string $dsn);

    public function prepare(string $sql, array $options = []): self;
    public function execute(?array $params = null): self;

    public function fetch(int $mode = \PDO::FETCH_DEFAULT, 
                          int $cursorOrientation = \PDO::FETCH_ORI_NEXT, 
                          int $cursorOffset = 0): mixed;

    public function fetchAll(string $class, 
                             int $mode = \PDO::FETCH_CLASS, 
                             ?array $constructorArgs = null): ArrayClass;
    
    public function exec(string $sql);
    
    public function getRawPdo();


}