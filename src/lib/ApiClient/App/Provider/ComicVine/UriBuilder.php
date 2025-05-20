<?php declare(strict_types=1);
/**
 * Class for building URIs to request API endpoints (incl. query string) dynamically
 * 
 * 
 * // &field_list=name,real_name,aliases,deck -> if we do not want the comlete field list
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-12
 * @link https://github.com/SchrodtSven/ApiClient
 */
namespace SchrodtSven\ApiClient\App\Provider\ComicVine;
use SchrodtSven\ApiClient\Dry\UriBuilderTrait;
use SchrodtSven\ApiClient\App\Provider\ComicVine\Endpoints;

class UriBuilder
{
    use UriBuilderTrait;

    private const DEFAULT_FORMAT = 'json';

    private const DEFAULT_OFFSET = 0;

    private const DEFAULT_LIMIT = 100;

    private const AVAILABLE_FORMATS = ['xml', 'json', 'jsonp'];

    private const AVAILABLE_SORTINGS = ['%s:asc', '%s:desc'];

    private const MANDATORY_PARAMETERS =['api_key'];

    private const DEFAULT_URI_ENDPOINT = Endpoints::BASE_URI . Endpoints::API_SEARCH;

    private int $offset = self::DEFAULT_OFFSET;

    private int $limit = self::DEFAULT_LIMIT;

    private string $format = self::DEFAULT_FORMAT;

    private array $queryStringParameters;
    

    public function __construct(private string $apiKey, private string $currentEndpoint = self::DEFAULT_URI_ENDPOINT)
    {
        $this->queryStringParameters = ['api_key' => $this->apiKey,
                                        'format' => self::DEFAULT_FORMAT,
                                        'offset' => $this->offset,
                                        'limit' => $this->limit];
    }

    public function getQueryString(): string
    {
        return http_build_query($this->queryStringParameters);
    }

    public function getEndpointUri(): string
    {
        return Endpoints::BASE_URI 
                                . $this->currentEndpoint 
                                . '?' 
                                . $this->getQueryString();
    }
}

// https://comicvine.gamespot.com/api/character/?api_key=82040eeb3fff53a4d6865e9cc0c0478afb0b7ea4&format=json&sort=name%3Adesc&offset=0&limit=100
// https://comicvine.gamespot.com/api/search/?api_key=82040eeb3fff53a4d6865e9cc0c0478afb0b7ea4&format=json&sort=name%3Aasc&resources=character&query=Spider-Man