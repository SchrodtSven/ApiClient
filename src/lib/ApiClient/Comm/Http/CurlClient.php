<?php declare(strict_types=1);
/**
 * Simpler access to  HTTP Client functions of the cURL - extension
 * currently the client is working with default settings - configuration will follow
 *
 *
 * @TODO DI-Container 4 cfg
 *
 * @FIXME reacting on http status code !== HttpProtocol::STATUS_CODE_OK
 *
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-09
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Comm\Http;

use Error;
use ErrorException;
use SchrodtSven\ApiClient\Type\StringClass;

class CurlClient
{

    /**
     * Used HTTP request method
     *
     * @var string
     */
    private string $method;

    /**
     * Used time to live for connection in seconds
     *
     * @var int
     */
    private int $ttl = 500;

    /**
     * HTTP response message
     *
     * @var string
     */
    private Response $response;

    /**
     * HTTP status code of last response
     *
     * @var int
     */
    private int $httpStatus = 0;

    /**
     * Raw HTTP response message
     *
     * @var string
     */
    private string $raw;


    /**
     * HTTP response headers
     *
     * @var string
     */
    private string $headers = '';

    /**
     * HTTP response payload ("body")
     *
     * @var string
     */
    private string $payload = '';

    /**
     * Internal ID for cUrl handle
     *
     * @var int {resource}
     */
    private mixed $curlHandle;

    /**
     * Separator of headers and payload
     *
     * @var string
     */
    const MESSAGE_SEPARATOR = "\r\n\r\n";

    /**
     * Constructor function
     *
     * @TODO injecting DI-Container 4 cfg
     * @throws \ErrorException
     */
    public function __construct(private ?string $uri = null)
    {
        if (!function_exists('curl_version')) {
            throw new \ErrorException('Extension cURL needed!');
        }
        // $this->initCurlRequest($uri);
    }

    /**
     * Initializing cUrl request with set parameters
     *
     * @param string $uri
     * @todo implement public setters for configuration instead of hard coding
     *
     */
    protected function initCurlRequest(string $uri)
    {
        $this->curlHandle = curl_init();
        if($this->curlHandle  ===false) {
            throw new ErrorException('Curl Handle could not be established!');
        }
        //var_dump($this->curlHandle);die;
        // Setting URI dor current request
        curl_setopt($this->curlHandle, CURLOPT_URL, $uri);

        // Returning response instead of writing to STDOUT
        curl_setopt($this->curlHandle, CURLOPT_RETURNTRANSFER, 1);

        // Setting timeout for connection creation
        curl_setopt($this->curlHandle, CURLOPT_CONNECTTIMEOUT, $this->ttl);

        // Reading response headers
        curl_setopt($this->curlHandle, CURLINFO_HEADER_OUT, 1);

        // Setting TTL for running cUrl functions
        curl_setopt($this->curlHandle, CURLOPT_TIMEOUT, $this->ttl);

        // Reading response headers from cUrl API!
        curl_setopt($this->curlHandle, CURLOPT_HEADER, 1);

        // Disabling SSL peer check
        curl_setopt($this->curlHandle, CURLOPT_SSL_VERIFYPEER, false);

    }

    /**
     * Generic function for processing HTTP(s) request to endpoint's uri with given
     * method and optional parameters (sent within uri or payload depending on
     * chosen method
     *
     * @param string $uri
     * @param string $method
     * @param array $parameters
     * @return HttpClient
     */
    public function processRequest(string $uri, string $method = 'GET', array $parameters = [])
    {

        // Setting $uri for current request
        $this->uri = $uri;

        // Init cUrl with current funtions
        $this->initCurlRequest($uri);

        // Setting HTTP method for current request
        $this->method = $method;

        // Setting up payload parameters, if set
        if (!empty($parameters)) {

            $this->setPayloadParameters($parameters);
        }

        // Saving response
        $this->raw = (string) curl_exec($this->curlHandle);

        // Saving http status code
        $this->httpStatus = curl_getinfo($this->curlHandle, CURLINFO_HTTP_CODE);

        // @FIXME q&d --> @TODO implement HTTP parser class

        $this->response = new Response($this->raw);
        //$response = list ($this->headers, $this->payload) = explode(self::MESSAGE_SEPARATOR, $this->response);
        return $this;
    }

    /**
     * Returning payload ('http body') of response
     *
     * @return string
     */
    public function getPayload(): StringClass
    {
        return $this->response->getPayload();
    }

    /***
     * Getter for (last) response http status code
     *
     * @return int
     */
    public function getHttpStatus()
    {
        return $this->httpStatus;
    }

    /**
     * Returning header of response
     *
     * @return string
     * @todo optional parsing headers to assoc. array
     *
     */
    public function getHeaders(): StringClass
    {
        return $this->response->getHeader();
    }

    /**
     * Processing http request with method GET to given URI
     *
     * @param string $uri
     * @return string
     */
    public function get(string $uri): StringClass
    {
        $this->processRequest($uri);
        return $this->getPayload();
    }

    // @FIXME -> implement me!!!
    public function setPayloadParameters()
    {

    }
}