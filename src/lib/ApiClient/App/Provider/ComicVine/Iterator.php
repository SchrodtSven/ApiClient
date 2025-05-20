<?php declare(strict_types=1);
/**
 * Iterator class for parsing given API result by 
 * 
 *  - given chrodtSven\ApiClient\App\Provider\ComicVine\RuleSet
 *  - given chrodtSven\ApiClient\App\Provider\ComicVine\Parser
 * 
 * automatically
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-17
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\App\Provider\ComicVine;

use SchrodtSven\ApiClient\Text\Parser\IteratorInterface;
use SchrodtSven\ApiClient\Text\Parser\ParserInterface;
use SchrodtSven\ApiClient\Text\Parser\RuleSetInterface;

class Iterator implements IteratorInterface
{
    
    public const BASE_URI = 'https://comicvine.gamespot.com/api/';
    public const AUTH_AND_FORMAT_QUERY_STRING_PART = 'api_key=YOUR-KEY&format=json';
    public const API_SEARCH = 'search/';
    public const CHARACTER_LIST = 'characters/';

    
    public function __construct(
        private ParserInterface $parser,
        private RuleSetInterface $ruleSet
    )
    {

    }

    public function walk(): mixed
    {
        return true;
    }


}