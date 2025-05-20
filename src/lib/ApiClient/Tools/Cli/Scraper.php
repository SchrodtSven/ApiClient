<?php declare(strict_types=1);
/**
 *  Cli tool for scraping content from Api
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-10
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Tool\Cli;
use SchrodtSven\ApiClient\Comm\Http\CurlClient;
use SchrodtSven\ApiClient\Comm\Http\Endpoint\Marvel as MarvelEndpoint;


class Scraper
{

    public function generateUriAndFilename(int $offset = 0, int $limit = 100): array
    {
        for($i=$offset;$i<$limit;$i++)
        {
                MarvelEndpoint::LISTS_OF_CHARACTERS
        }
            return [];
    }
}
