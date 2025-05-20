<?php declare(strict_types=1);
/**
 * Class managing http(s) file uploads
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-02-07
 * 
 */

namespace SchrodtSven\ApiClient\Comm\Http;

use SchrodtSven\ApiClient\Type\ArrayClass;

class FileUploader
{
    private string $uploadDir = 'uploads/';

    private FilesObject $files;

    private bool $isSingleFile = true;

    

    /***
     * @FIXME -> implement Request/Response
     */
    public function __construct($request = null)
    {
        $this->files = new FilesObject();
    }


    
    
}
