<?php declare(strict_types=1);
/**
 * Driver class for PDO instances of Sqlite3 databases
 *
*
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-09
 */

namespace SchrodtSven\ApiClient\Stor\Driver;

use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\Type\StringClass;

class Sqlite
{


    private static ?self $instance = null;    
    

    
    /**
     * Internal instance of \PDO
     */
    private ?\PDO $pdo = null;

    /**
     * Instance of last executed statement
     */
    private ?\PDOStatement $lastStatement = null;

    //@FIXME -> via Config
    public const PATH_2_FILE = 'src/apis/marvel.com/sqlite_content.db';
    
    //'private/lib/ApiClient/App/data/contents.db';


    public function __construct(private ?string $dsn = null, bool $autoConnect = true)
    {
        if (is_null($dsn)) {
            $this->dsn = 'sqlite:' . self::PATH_2_FILE;
        }
        if ($autoConnect)
            $this->connect($this->dsn);
    }

    public function connect(string $dsn): self
    {

        $this->pdo = new \PDO($dsn);
        return $this;
    }

//prep stmt
    public function prepare(string $query, array $options = []): self
    {
        //echo $query . PHP_EOL;
        $this->lastStatement = $this->pdo->prepare($query, $options);
        return $this;
    }

    public function execute(?array $params = null): self
    {
        $this->lastStatement->execute($params); 
      //  $this->lastStatement->debugDumpParams();
        return $this;
    }


// 



    public function query(string $sql): self
    {
        $this->lastStatement =  $this->pdo->query($sql);
        return $this;
    }

    public function exec(string $sql): self
    {
        $this->pdo->exec($sql);
        return $this;
    }

    public function getRawPdo(): \Pdo
    {
        return $this->pdo;
    }

    public function fetch(int $mode = \PDO::FETCH_DEFAULT, 
                          int $cursorOrientation = \PDO::FETCH_ORI_NEXT, 
                          int $cursorOffset = 0): mixed
    {
        return $this->lastStatement->fetch($mode, $cursorOrientation, $cursorOffset);
    }

    public function fetchAll(string $class = 'stdClass', 
                             int $mode = \PDO::FETCH_CLASS, 
                             ?array $constructorArgs = null): ArrayClass
    {
        $foo =  $this->lastStatement->fetchAll($mode, $class, $constructorArgs);

        return (is_null($foo))? new ArrayClass() : new ArrayClass($foo);
    }

    public function getDataFromPreparedStatement(string $preparedStatement,
                                                 string $class = 'stdClass', 
                                                 int $mode = \PDO::FETCH_CLASS, 
                                                 ?array $constructorArgs = null )
    {
        return $this->prepare($preparedStatement)
        ->execute()
        ->fetchAll($class, $mode, $constructorArgs);
    }

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getLastId(): mixed
    {
        $this->pdo->lastInsertId();
    }

}
