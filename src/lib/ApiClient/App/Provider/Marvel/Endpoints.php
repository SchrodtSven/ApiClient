<?php declare(strict_types=1);
/**
 *  Class managing access to Marvel's API endpoints
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-09
 * @link https://github.com/SchrodtSven/ApiClient
 */

 namespace SchrodtSven\ApiClient\App\Provider\Marvel;

class Endpoints
{

    private const MAX_LIMIT = 100;

    private int $limit = self::MAX_LIMIT;

    private int $offset = 0;

    // @FIXME!!! out to config - never commit that!!
    private string $privateKey = '4ea332555596e42b08b693f09cfee311d0164c32';

    private string $publicKey = 'b66b7896c2cb68dab0f65627c2bf6394';


    public const BASE_URI = 'https://gateway.marvel.com/v1/public/';

    // Fetches  lists of characters.
    public const LISTS_OF_CHARACTERS = 'characters';

    // Fetches  a single character by id.
    public const A_SINGLE_CHARACTER_BY_ID = 'characters/%d';

    // Fetches  lists of comics filtered by a character id.
    public const LISTS_OF_COMICS_FILTERED_BY_A_CHARACTER_ID = 'characters/%d/comics';

    // Fetches  lists of events filtered by a character id.
    public const LISTS_OF_EVENTS_FILTERED_BY_A_CHARACTER_ID = 'characters/%d/events';

    // Fetches  lists of series filtered by a character id.
    public const LISTS_OF_SERIES_FILTERED_BY_A_CHARACTER_ID = 'characters/%d/series';

    // Fetches  lists of stories filtered by a character id.
    public const LISTS_OF_STORIES_FILTERED_BY_A_CHARACTER_ID = 'characters/%d/stories';

    // Fetches  lists of comics.
    public const LISTS_OF_COMICS = 'comics';

    // Fetches  a single comic by id.
    public const A_SINGLE_COMIC_BY_ID = 'comics/%d';

    // Fetches  lists of characters filtered by a comic id.
    public const LISTS_OF_CHARACTERS_FILTERED_BY_A_COMIC_ID = 'comics/%d/characters';

    // Fetches  lists of creators filtered by a comic id.
    public const LISTS_OF_CREATORS_FILTERED_BY_A_COMIC_ID = 'comics/%d/creators';

    // Fetches  lists of events filtered by a comic id.
    public const LISTS_OF_EVENTS_FILTERED_BY_A_COMIC_ID = 'comics/%d/events';

    // Fetches  lists of stories filtered by a comic id.
    public const LISTS_OF_STORIES_FILTERED_BY_A_COMIC_ID = 'comics/%d/stories';

    // Fetches  lists of creators.
    public const LISTS_OF_CREATORS = 'creators';

    // Fetches  a single creator by id.
    public const A_SINGLE_CREATOR_BY_ID = 'creators/%d';

    // Fetches  lists of comics filtered by a creator id.
    public const LISTS_OF_COMICS_FILTERED_BY_A_CREATOR_ID = 'creators/%d/comics';

    // Fetches  lists of events filtered by a creator id.
    public const LISTS_OF_EVENTS_FILTERED_BY_A_CREATOR_ID = 'creators/%d/events';

    // Fetches  lists of series filtered by a creator id.
    public const LISTS_OF_SERIES_FILTERED_BY_A_CREATOR_ID = 'creators/%d/series';

    // Fetches  lists of stories filtered by a creator id.
    public const LISTS_OF_STORIES_FILTERED_BY_A_CREATOR_ID = 'creators/%d/stories';

    // Fetches  lists of events.
    public const LISTS_OF_EVENTS = 'events';

    // Fetches  a single event by id.
    public const A_SINGLE_EVENT_BY_ID = 'events/%d';

    // Fetches  lists of characters filtered by an event id.
    public const LISTS_OF_CHARACTERS_FILTERED_BY_AN_EVENT_ID = 'events/%d/characters';

    // Fetches  lists of comics filtered by an event id.
    public const LISTS_OF_COMICS_FILTERED_BY_AN_EVENT_ID = 'events/%d/comics';

    // Fetches  lists of creators filtered by an event id.
    public const LISTS_OF_CREATORS_FILTERED_BY_AN_EVENT_ID = 'events/%d/creators';

    // Fetches  lists of series filtered by an event id.
    public const LISTS_OF_SERIES_FILTERED_BY_AN_EVENT_ID = 'events/%d/series';

    // Fetches  lists of stories filtered by an event id.
    public const LISTS_OF_STORIES_FILTERED_BY_AN_EVENT_ID = 'events/%d/stories';

    // Fetches  lists of series.
    public const LISTS_OF_SERIES = 'series';

    // Fetches  a single comic series by id.
    public const A_SINGLE_COMIC_SERIES_BY_ID = 'series/%d';

    // Fetches  lists of characters filtered by a series id.
    public const LISTS_OF_CHARACTERS_FILTERED_BY_A_SERIES_ID = 'series/%d/characters';

    // Fetches  lists of comics filtered by a series id.
    public const LISTS_OF_COMICS_FILTERED_BY_A_SERIES_ID = 'series/%d/comics';

    // Fetches  lists of creators filtered by a series id.
    public const LISTS_OF_CREATORS_FILTERED_BY_A_SERIES_ID = 'series/%d/creators';

    // Fetches  lists of events filtered by a series id.
    public const LISTS_OF_EVENTS_FILTERED_BY_A_SERIES_ID = 'series/%d/events';

    // Fetches  lists of stories filtered by a series id.
    public const LISTS_OF_STORIES_FILTERED_BY_A_SERIES_ID = 'series/%d/stories';

    // Fetches  lists of stories.
    public const LISTS_OF_STORIES = 'stories';

    // Fetches  a single comic story by id.
    public const A_SINGLE_COMIC_STORY_BY_ID = 'stories/%d';

    // Fetches  lists of characters filtered by a story id.
    public const LISTS_OF_CHARACTERS_FILTERED_BY_A_STORY_ID = 'stories/%d/characters';

    // Fetches  lists of comics filtered by a story id.
    public const LISTS_OF_COMICS_FILTERED_BY_A_STORY_ID = 'stories/%d/comics';

    // Fetches  lists of creators filtered by a story id.
    public const LISTS_OF_CREATORS_FILTERED_BY_A_STORY_ID = 'stories/%d/creators';

    // Fetches  lists of events filtered by a story id.
    public const LISTS_OF_EVENTS_FILTERED_BY_A_STORY_ID = 'stories/%d/events';

    // Fetches  lists of series filtered by a story id.
    public const LISTS_OF_SERIES_FILTERED_BY_A_STORY_ID = 'stories/%d/series';



 
}
