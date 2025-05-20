<?php

declare(strict_types=1);
/**
 * Class representing general HTTP protocol
 * (methods, headers, other attributes etc.)
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-02-08
 * 
 */

namespace SchrodtSven\ApiClient\Comm\Http;

use SchrodtSven\ApiClient\Type\StringClass;

class Parser
{
    private StringClass $message;

    public function __construct(\Stringable | string $message)
    {
        $this->message = new StringClass((string) $message);    
        $this->preparse();
    }

    private function preparse(): void
    {

    }


}