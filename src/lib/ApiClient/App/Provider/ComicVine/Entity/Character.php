<?php

//@TODO ->setter&&GEtter incl. 

//@TODO "on the fy" entity with anonymous class!!!

namespace SchrodtSven\ApiClient\App\Provider\ComicVine\Entity;
// namespace SchrodtSven\ApiClient\App\Provider\{PROVIDER_NAME}\Entity;
class Character
{
    private string $aliases; // parseMe!!! ->PHP_EOL sep. -> private ArrayClass $aliases
    private string $apiDetailUrl;
    private string $birth;
    private int $countOfIssueAppearances;
    private string $dateAdded;
    private string $dateLastUpdated;
    private string $deck;
    private string $description;
    private \stdClass $firstAppearedInIssue; // new Entity
    private int $gender;
    private int $id;
    private \stdClass $image; // new Entity
    private string $name;
    private \stdClass $origin; // new Entity
    private \stdClass $publisher; // new Entity
    private string $realName;
    private string $siteDetailUrl;

}