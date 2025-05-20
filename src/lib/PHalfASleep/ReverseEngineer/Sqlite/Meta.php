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
namespace SchrodtSven\PHalfAsleep\ReverseEngineer\Sqlite;

class Meta
{
    /**
     *  Pragma expressions for usage with PHP 's *printf functions & optionlly 
     *  furher usage in prepared statements
     */
     

    public const PRAGMA_DESCRIBE_TABLE = "pragma table_info('%s')";

    public const PRAGMA_INDEX_INFO = "PRAGMA index_info('%s');";

    PUBLIC CONST SHOW_USER_TABLE_NAMES = "SELECT name FROM sqlite_schema WHERE 
                                        type ='table' AND 
                                        name NOT LIKE 'sqlite_%';";

    PUBLIC CONST SHOW_USER_TABLE_NAMES_BY_CONDITION = "SELECT name FROM sqlite_schema 
                                    WHERE  type ='table' 
                                    AND name NOT LIKE 'sqlite_%%'
                                    AND %s;";   

    
}