<?php declare(strict_types=1);
 /**
  * Entity class representing Marvel events
  * 
  * @author Sven Schrodt<sven@schrodt.club>
  * @link https://github.com/SchrodtSven/ApiClient
  * @package ApiClient
  * @version 0.1
  * @since 2025-01-10
  */
namespace SchrodtSven\ApiClient\App\Provider\Marvel;

class Event
{
    private int $id;
    private int $marvelId;
    private string $title;
    private string $description;
    private array $urls;
    private string $modified;
    private string $startDate;
    private string $endDate;

    private string $thumbUri;

    protected array $matchDb2Entity = ['marvel_id' => 'marvelId', 
                                       'end_date' => 'endDate', 
                                       'start_date' => 'startDate'];

    protected array $matchApi2Entity = ['start' => 'startDate', 
                                        'end' => 'endDate'];



}