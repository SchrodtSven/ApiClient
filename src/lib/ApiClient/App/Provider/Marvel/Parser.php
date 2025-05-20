<?php declare(strict_types=1);
/**
 * Class for parsing Marvel's API result data (json)
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-09
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\App\Provider\Marvel;

use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\ApiClient\Stor\Driver\Sqlite;
use SchrodtSven\ApiClient\App\Provider\Marvel\Query as MarvelQuery;

class Parser
 {
    public function handleCharacterName(string $name): array
    {
        $full = new StringClass($name);
        if($full->contains('(')) {
            $tmp = $full->splitBy('(');
            $char = (new StringClass($tmp[0]))->trim();
            $priv = (new StringClass($tmp[1]))->replace(')', '')->trim();
        } else {
            $char = (new StringClass($name))->trim();
            $priv = '';
        }

        return [(string) $priv, (string) $char];
    }


    /**
     * Parsing event list 
     * 
     * Extracting data from API at endpoint 
     * <code> 
     * https://gateway.marvel.com/v1/public/events
     * </code> 
     * 
     * @param string $rawJson
     * @return mixed
     */
    public function readEventList(string $rawJson)
    {
        $phpData = json_decode($rawJson);

        $driver =  Sqlite::getInstance();

        foreach($phpData->data->results as $item) {

           die((string) (new ArrayClass([
            __CLASS__,
            'line ',
            __LINE__
           ]))->join(' - '));

            $int = ['id'];
            $strs = ['title', 'description', 'resourceURI', 'urls', 'modified', 'start', 'end'];
            $compound = ['thumbnail', 'creators', 'characters', 'stories', 'comics', 'series', 'next', 'previous'];

            $item = $this->sanitizeEventItem($item);
            echo $item->title . PHP_EOL;    
            //$this->readEventCharacters($item->characters->items, $item->id);

            $this->readEventCreators($item->creators->items, $item->id);
            /* 
            $driver->prepare(MarvelQuery::EVENT_FULL_INSERT)
                   ->execute([':marvelId' => $item->id, 
                              ':title' => $item->title,  
                              ':startDate' => $item->start,  
                              ':endDate' => $item->end, 
                              ':description' => $item->description, 
                              ':thumbUri' => $this->getThumbUri($item->thumbnail)]);
            
            echo $item->title . PHP_EOL;
            
             */
            
           //die;
           //(date('Y-m-d H:i:s') . ' - foo');
          // return true;
        }
    }


    public function getThumbUri(\stdClass $thumbnail): StringClass
    {
        return (new StringClass($thumbnail->path))
                        ->append('.')
                        ->append($thumbnail->extension);

    }


    public function readEventCharacters(array $characters, int $eventId): void
    {
        for($i=0;$i<count($characters);$i++) {
                $characters[$i]->eventId = $eventId;
                $characters[$i]->id = $this->extractIdFromCharacterUri($characters[$i]->resourceURI);
                //var_dump($characters[$i]); 
                $this->saveEventCharacterItem($characters[$i]);
        }

       
    }
    

    public function readEventCreators(array $creators, int $eventId): void
    {

      //  var_dump($creators[0]);die;

        for($i=0;$i<count($creators);$i++) {
                $creators[$i]->eventId = $eventId;
                $creators[$i]->id = $this->extractIdFromCharacterUri($creators[$i]->resourceURI);
                //var_dump($characters[$i]); 
                $this->saveEventCreatorItem($creators[$i]);
        }

       
    }


    
    // 

    public function saveEventCreatorItem(\stdClass $item): void
    {   
        $driver =  Sqlite::getInstance();
        $driver->prepare(MarvelQuery::EVENT_CREATOR_FULL_INSERT)
               ->execute([':marvelCreatorId' => $item->id, 
                          ':marvelEventId' => $item->eventId, 
                          ':role' => $item->role,
                          ':creatName' => $item->name]);
    }

    public function saveEventCharacterItem(\stdClass $item): void
    {   
        $driver =  Sqlite::getInstance();
        $driver->prepare(MarvelQuery::EVENT_CHARACTER_FULL_INSERT)
               ->execute([':marvelCharacterId' => $item->id, 
                          ':marvelEventId' => $item->eventId, 
                          ':charName' => $item->name]);
        
    }

    public function sanitizeEventItem(\stdClass $item): \stdClass
    {
        if(is_null($item->start)) {
            $item->start = '1970-01-01 00-23-42';
        }

        if(is_null($item->end)) {
            $item->end = '1970-01-01 00-23-42';
        }

        return $item;
    }

    public function extractIdFromCharacterUri(string $uri): int
    {
        $tmp = (new StringClass($uri))->splitBy('/');
        return (int) $tmp->pop();
    }

/**
     * Parsing character list 
     * 
     * Extracting data from API at endpoint 
     * <code> 
     * </code> 
     * https://gateway.marvel.com/v1/public/character?offset=0&limit=100&{AUTHPART}
     * 
     * @param string $rawJson
     * @return mixed
     */
    public function readCharacterList(string $rawJson)
    {
        $phpData = json_decode($rawJson);

        $driver =  Sqlite::getInstance();

        foreach($phpData->data->results as $item) {

           //var_dump($item);die;
            $item = $this->sanitizeCharacterItem($item);
            echo $item->name . PHP_EOL;
            list($privName, $charName) = $this->handleCharacterName($item->name);
            
            try {

                $args = [
                    'marvelId'=> $item->id, 
                    'privName' => $privName, 
                    'charName' => $charName, 
                    'description' => $item->description, 
                    'thumbUri' => $this->getThumbUri($item->thumbnail), 
                    'apiName' => $item->name
                ];
    
                
                $driver->prepare(MarvelQuery::CHARACTER_FULL_INSERT)
                       ->execute($args);
                //var_dump($args);die;
        
            } catch (\Exception $e) {
                echo $e->getMessage();
                var_dump($args);
                var_dump(MarvelQuery::CHARACTER_FULL_INSERT);
            }

            
        }
    }

    /**
     * Parsing creator list 
     * 
     * Extracting data from API at endpoint 
     * <code> 
     * https://gateway.marvel.com/v1/public/events
     * </code> 
     * 
     * @param string $rawJson
     * @return mixed
     */
    public function readCreatorList(string $rawJson)
    {
        $phpData = json_decode($rawJson);

        $driver =  Sqlite::getInstance();

        foreach($phpData->data->results as $item) {

           
            $item = $this->sanitizeCreatorItem($item);
            echo $item->fullName . PHP_EOL;    
            

            //firstName, middleName, lastName, suffix, fullName, modified, thumbnail,
            $driver->prepare(MarvelQuery::CREATOR_FULL_INSERT)
                   ->execute([':marvelId' => $item->id, 
                              ':modified' => $item->modified,  
                              ':firstName' =>$item->firstName, 
                              ':midName'  =>$item->middleName,
                              ':lastName'  =>$item->lastName, 
                              ':suffix'  =>$item->suffix, 
                              ':fullName'  =>$item->fullName,
                              ':thumbUri' => $this->getThumbUri($item->thumbnail)]);
            
            //die;
        }
    }

    public function sanitizeCharacterItem(\stdClass $item): \stdClass
    {
        return $item;
    }

    public function sanitizeCreatorItem(\stdClass $item): \stdClass
    {
       $props = ['midName', 'firstName', 'middleName', 'lastName', 'suffix', 'thumbUri', 'fullName', 'modified'];
       foreach($props as $prop)
       if(!isset($item->$prop)) {
            $item->$prop = '..-';
        }
        return $item;
    }
 }