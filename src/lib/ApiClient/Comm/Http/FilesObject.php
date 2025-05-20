<?php declare(strict_types=1);
/**
 * Class managing http(s) file uploads
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-02-08
 * 
 */

namespace SchrodtSven\ApiClient\Comm\Http;

use SchrodtSven\ApiClient\Type\ArrayClass;

class FilesObject
{
    
    private ArrayClass $content;
    

    /***
     * @FIXME -> implement Request/Response
     */
    public function __construct()
    {
        
        $this->init();
    }

    private function init(): void
    {
        $this->content = new ArrayClass($_FILES);
        //var_dump($this->content->keys());
    }

    public function getFileInfoByElementName(string $name): ?ArrayClass
    {
        return ($this->content->hasKey($name)) ? new ArrayClass($this->content[$name])
                                               : null;
    }

    public function getElementNames(): ArrayClass
    {
        return $this->content->keys();
    }
}
