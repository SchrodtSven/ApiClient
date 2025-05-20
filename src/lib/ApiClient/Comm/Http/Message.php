<?php

declare(strict_types=1);
/**
 * Class representing HTTP messages (requests, responses) in general
 * 
 * Message 
 * 
 * Start-line
 * 1-x Header
 * empty line (Protocol::MESSAGE_SEPARATOR)
 * paylod ("body")
 * 
 * Nomenclatura note: 
 *  - The start-line is called the "request-line" in requests.
 *  - The start-line is called the "status line" in responses.
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
use SchrodtSven\ApiClient\Type\ArrayClass;

class Message
{
    private StringClass $message;

    private StringClass $header;

    private ArrayClass $headers;

    private StringClass $startLine;

    private StringClass $payload;

    public function __construct(\Stringable | string $message)
    {
        $this->message = new StringClass((string) $message);    
        $this->preparse();
    }

    private function preparse(): void
    {
        //@FIXME - think about multi-part messaging!!!
        $tmp = $this->message->splitBy(Protocol::MESSAGE_SEPARATOR);
        $this->header = new StringClass($tmp->shift());
        $this->payload =new StringClass ($tmp->shift());
        $this->parseHeader();
    }

    private function parseHeader(): void
    {
        $tmp = $this->header->splitBy(Protocol::HEADER_SEPARATOR);
        $this->startLine = $tmp->shift();
        //Protocol::H
    }


    /**
     * Get the value of message
     *
     * @return StringClass
     */
    public function getMessage(): StringClass
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param StringClass $message
     *
     * @return self
     */
    public function setMessage(StringClass $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of header
     *
     * @return StringClass
     */
    public function getHeader(): StringClass
    {
        return $this->header;
    }

    /**
     * Set the value of header
     *
     * @param StringClass $header
     *
     * @return self
     */
    public function setHeader(StringClass $header): self
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get the value of payload
     *
     * @return StringClass
     */
    public function getPayload(): StringClass
    {
        return $this->payload;
    }

    /**
     * Set the value of payload
     *
     * @param StringClass $payload
     *
     * @return self
     */
    public function setPayload(StringClass $payload): self
    {
        $this->payload = $payload;

        return $this;
    }
}