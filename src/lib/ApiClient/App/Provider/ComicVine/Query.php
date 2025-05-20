<?php declare(strict_types=1);
/**
 * Class containing needed SQL queries to access cached data in rel. data bases for Comic Vine 
 * (https://comicvine.gamespot.com/api/) data
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-15
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\App\Provider\ComicVine;

class Query
{

  public const CHARACTER_FULL_INSERT = "";


  public const CHARACTER_GET_BY_GENERIC = "SELECT * FROM character
                WHERE %s = :value";


  public const CREATOR_GET_BY_GENERIC = "SELECT * FROM creator
              WHERE %s = :value";



  public const EVENT_FULL_INSERT = "INSERT INTO event 
                (id, marvel_id, title, start_date, end_date, description, thumb_uri)
              VALUES 
                (:id, :marvelId, :title, :startDate, :endDate, :description, :thumbUri);";

  public const EVENT_CHARACTER_FULL_INSERT = "INSERT INTO event_character
                (marvel_character_id, marvel_event_id, char_name)
              VALUES 
                (:marvelCharacterId, :marvelEventId, :charName);";

  public const EVENT_CREATOR_FULL_INSERT = "INSERT INTO event_creator
               (marvel_creator_id, marvel_event_id, creat_name, role)
              VALUES 
               (:marvelCreatorId, :marvelEventId, :creatName, :role);";

  public const CREATOR_FULL_INSERT = "INSERT INTO creator
                (marvel_id, first_name, mid_name, last_name, suffix, thumb_uri, full_name, modified)
             VALUES
                (:marvelId, :firstName, :midName, :lastName, :suffix, :thumbUri, :fullName, :modified)";
}
