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

namespace  SchrodtSven\PHalfAsleep\Entity\Sqlite;

use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Type\Matcher as PhpMatcher;

class Column
{
   
   /**
     * Column id
     * <code>cid</code> in response of <code>pragma table_info('{TABLE_NAME})'<code> 
     *         
     */
    private int $cid;
    
    /**
     * Name of column
     * <code>name</code> in response of <code>pragma table_info('{TABLE_NAME})'<code> 
     *         
     */
    private string $name;
    
    /**
     * Data type for column
     * <code>type</code> in response of <code>pragma table_info('{TABLE_NAME})'<code> 
     *         
     */
    private string $type;
    
    /**
     * Flag, if nullable column value is allowed
     * <code>notnull</code> in response of <code>pragma table_info('{TABLE_NAME})'<code> 
     *         
     */
    private bool $notnull;
    
    /**
     * Optional default value of column
     * <code>dflt_value</code> in response of <code>pragma table_info('{TABLE_NAME})'<code> 
     *         
     */
    private mixed $defaultValue;
    
    /**
     * Flag if column is primary key
     * <code>pk</code> in response of <code>pragma table_info('{TABLE_NAME})'<code> 
     *         
     */
    private bool $primaryKey;    

    /**
     * Array matching db entity attribute name to PHP entity property name
     * (& vice versa via constructor; @see self::reverseMatch)
     *
     * @var array
     */
    private array $match = ['cid' =>  'columnId',
                            'name' =>  'name',
                            'type' =>  'type',
                            'notnull' =>  'notnull',
                            'dflt_value' =>  'defaultValue',
                            'pk' =>  'primaryKey']; 

    /**
     * Flipped db name -> PHP property
     *
     * @var array
     */                        
    private array $reverseMatch;

    /**
     * Constructor function 
     */
    public function __construct()
    {
        $this->reverseMatch = array_flip($this->match);
    }

    /**
     * Matching given db entity attribute name to PHP entity property name
     *
     * @param string $dbName
     * @deprecated version
     * @return string
     */
    public function matchName(string $dbName): string
    {
        return match($dbName) {
            'cid' =>  'columnId',
            'name' =>  'name',
            'type' =>  'type',
            'notnull' =>  'notnull',
            'dflt_value' =>  'defaultValue',
            'pk' =>  'primaryKey'
        };
    }

    /**
     * Magical interceptor setter function (to be used by \PDO* only)
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, mixed $value): void
    {
        $matcher = new PhpMatcher();
        $propertyName = $this->match[$name];
        $this->$propertyName = (is_numeric($value)) ? $matcher->numberToBoolLiteral($value) : $value;
    }

    /**
     * Matching given db entity attribute name to PHP entity property name
     *
     * @param string $dbName
     * @deprecated version
     * @return string
     */
    public function match(string $item) : ?string
    {
        return  $this->match[$item] ?? null;
    }
    
    /**
     * Matching PHP entity property name to given db entity attribute name
     *
     * @param string $dbName
     * @deprecated version
     * @return string
     */
    public function reMatch(string $item) : ?string
    {
        return  $this->reverseMatch[$item] ?? null;
    }

    /**
     * Get the value of cid
     *
     * @return int
     */
    public function getCid(): int
    {
        return $this->cid;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get the value of notnull
     *
     * @return bool
     */
    public function getNotnull(): bool
    {
        return $this->notnull;
    }



    /**
     * Get the value of defaultValue
     *
     * @return mixed
     */
    public function getDefaultValue(): mixed
    {
        return $this->defaultValue;
    }


    /**
     * Get the value of primaryKey
     *
     * @return bool
     */
    public function getPrimaryKey(): bool
    {
        return $this->primaryKey;
    }

    public function __toString(): string
    {
        $reflection = new \ReflectionClass($this);
        //var_dump($reflection->getProperties());die;
        return (string) (new ArrayClass($reflection->getProperties()));
        
    }

}