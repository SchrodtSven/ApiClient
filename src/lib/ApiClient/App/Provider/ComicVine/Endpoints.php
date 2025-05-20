<?php declare(strict_types=1);
/**
 * Class holding Comic Vine's API endpoint(s) information 
 * 
 * example endpoint usages:
 * 
 * To find a list of volumes based on some text criteria:
 * 
 * https://comicvine.gamespot.com/api/volumes/?api_key=YOUR-KEY&format=json&sort=name:asc&filter=name:Walking%20Dead
 * 
 * To find a set of issues based on some text criteria: 
 * https://comicvine.gamespot.com/api/search/?api_key=YOUR-KEY&format=json&sort=name:asc&resources=issue&query=%22Master%20of%20kung%20fu%22
 * 
 * To find a single issue based on an ID:
 * 
 * https://comicvine.gamespot.com/api/issue/4000-14582/?api_key=YOUR-KEY&format=json
 * 
 * 
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-12
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\App\Provider\ComicVine;

class Endpoints
{
    
    public const BASE_URI = 'https://comicvine.gamespot.com/api/';
    public const AUTH_AND_FORMAT_QUERY_STRING_PART = 'api_key=YOUR-KEY&format=json';
    public const API_SEARCH = 'search/';
    public const CHARACTER_LIST = 'characters/';

    



}