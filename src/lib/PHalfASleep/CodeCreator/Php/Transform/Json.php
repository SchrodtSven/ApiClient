<?php declare(strict_types=1);
 /**
  * Transforming JSON input data to:
  *
  * - PHP data structures
  * - SQL commands (CREATE, INSERT, UPDATE, SELECT, DELETE ...)
  * - XML etc.
  *
  * @author Sven Schrodt<sven@schrodt.club>
  * @link https://github.com/SchrodtSven/ApiClient
  * @package ApiClient
  * @version 0.1
  * @since 2025-01-13
  */
namespace SchrodtSven\PHalfAsleep\CodeCreator\Php\Transform;
use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Type\Matcher;

class Json
{
    private mixed $preParsed;
    private ArrayClass $firstLevelPreparsedTree;
    private array $firstLevelKeys;

    //private array $typeKeyMatch = [];

    private array $matchName = [];

    public function __construct(private string $rawJson)
    {
        $this->preParsed = json_decode($rawJson);
        $this->firstLevelKeys = $this->getFirstLevelKeys(); 
        $this->firstLevelPreparsedTree = new ArrayClass();
        for($i=0; $i<count($this->firstLevelKeys);$i++) {
            $key = $this->firstLevelKeys[$i];
            $keyObj = new StringClass($key);
            // @TODO if 'object' ==> $this->preParsed->$key::class 
            if($keyObj->contains('_')) {
                $new = (string) $keyObj->camelize();
                $this->matchName[$key] = $new;
                $keyCamel = $new;
            } else {
                $keyCamel = $key;
            }
            $this->firstLevelPreparsedTree[$keyCamel] = (new Matcher())->toNativeType(gettype($this->preParsed->$key));

        }    
    }

    public function getPreparsed(): mixed
    {
        return $this->preParsed;

    }
    public function getFirstLevelKeys(): array
    {
        return array_keys(get_object_vars($this->preParsed));
    }

    

    /**
     * Get the value of firstLevelPreparsedTree
     *
     * @return ArrayClass
     */
    public function getFirstLevelPreparsedTree(): ArrayClass
    {
        return $this->firstLevelPreparsedTree;
    }

    /**
     * Set the value of firstLevelPreparsedTree
     *
     * @param ArrayClass $firstLevelPreparsedTree
     *
     * @return self
     */
    public function setFirstLevelPreparsedTree(ArrayClass $firstLevelPreparsedTree): self
    {
        $this->firstLevelPreparsedTree = $firstLevelPreparsedTree;

        return $this;
    }
}