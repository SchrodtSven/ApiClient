<?php declare(strict_types=1);
/**
 *  'Worker bee' for reverse engineering existing SQLite schema(s)
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-21
 * @link https://github.com/SchrodtSven/ApiClient
 */
namespace SchrodtSven\PHalfAsleep\ReverseEngineer\Sqlite;
use SchrodtSven\ApiClient\Stor\Driver\Sqlite;
use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Type\Matcher;
use SchrodtSven\PHalfAsleep\Entity\Sqlite\Column;

class Drone
{
    private ArrayClass $entityList; 

    private ArrayClass $schema;

    /**
     * Optionally used static instance, if application  wants <code>self</code> as Singleton
     *
     * @var self
     */
    private static ?self $instance = null;

    public function __construct(private Sqlite $driver, private ?ArrayClass $tables = null, bool $autoFly=true)
    {
        if(!is_null($this->tables)) {
            //@FIXME

        }
        if($autoFly) $this->init(); //don't do this @home, kidz :eg
    }    

    public function init()
    {
        $this->entityList = $this->driver->getDataFromPreparedStatement(Meta::SHOW_USER_TABLE_NAMES);
        $this->schema = new ArrayClass();
        
        for($i=0; $i<count($this->getEntityList());$i++) {
            $table = (string) $this->entityList[$i]->name;
            $this->schema[$table] = $this->driver->getDataFromPreparedStatement(
                                                        sprintf(Meta::PRAGMA_DESCRIBE_TABLE, $table),
                                                        'SchrodtSven\PHalfAsleep\Entity\Sqlite\Column'
            );
        }
    }

    /**
     * Get the value of driver
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * Get the value of tables
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * Optionally used static instance getter function , if application  wants <code>self</code> as Singleton
     *
     * @var self
     */
    public static function getInstance(Sqlite $driver, ?ArrayClass $tables = null, bool $autoFly=true): self
    {
        if(is_null(self::$instance)) {
            self::$instance = new self($driver, $tables, $autoFly);
        }
        return self::$instance;
    }

    /**
     * Get the value of entityList
     *
     * @return ArrayClass
     */
    public function getEntityList(bool $namesOnly=false): ArrayClass
    {

        return ($namesOnly) 
                            ? $this->entityList->cutColumn('name')
                            : $this->entityList;
    }

    /**
     * Set the value of entityList
     *
     * @param ArrayClass $entityList
     *
     * @return self
     */
    private function setEntityList(ArrayClass $entityList): self
    {
        $this->entityList = $entityList;

        return $this;
    }

    /**
     * Get the value of schema
     *
     * @return ArrayClass
     */
    public function getSchema(): ArrayClass
    {
        return $this->schema;
    } 
}