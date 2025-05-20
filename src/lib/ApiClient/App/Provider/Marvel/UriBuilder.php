<?php declare(strict_types=1);
/**
 * Class for building URIs to request API endpoints (incl. query string) dynamically
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-12
 * @link https://github.com/SchrodtSven/ApiClient
 */
namespace SchrodtSven\ApiClient\App\Provider\Marvel;
use SchrodtSven\ApiClient\App\Provider\Marvel\Endpoints;
use SchrodtSven\ApiClient\Dry\UriBuilderTrait;

class UriBuilder
{
    use UriBuilderTrait;

    // used for sanitizing bulit URIs
    private array $mandatoryQueryStringParameter =['apikey', 'ts', 'hash'];

    private const MAX_LIMIT = 100;

    private int $limit = self::MAX_LIMIT;

    private int $offset = 0;

    private array $currentQueryStringParameter; 

    

    private const DEFAULT_URI_ENDPOINT = Endpoints::BASE_URI . Endpoints::LISTS_OF_CHARACTERS;
    
    public function __construct(private string $privateKey, private string $publicKey, private $currentEndpoint = self::DEFAULT_URI_ENDPOINT)
    {
        
        $ts = time();
        $this->currentQueryStringParameter = [
            'apikey' => $this->publicKey,
            'hash' => md5($ts . $this->privateKey . $this->publicKey),
            'ts' => $ts,
            'offset' =>$this->offset,
            'limit' => $this->limit
            ];
    }


    /**
     * Get the value of offset
     *
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * Set the value of offset
     *
     * @param int $offset
     *
     * @return self
     */
    public function setOffset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Get the value of limit
     *
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * Set the value of limit
     *
     * @param int $limit
     *
     * @return self
     */
    public function setLimit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function stepOffset(): void
    {
        $this->offset += $this->limit;
    }

 




}