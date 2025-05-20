<?php declare(strict_types=1);
/**
 * Class for generic parsing of Json input (API results etc.)
 * 
 * - converts snake_cased_names of property names to camelCasedNames 
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-16
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Text\Parser;
use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Type\Matcher;
use SchrodtSven\ApiClient\Text\Parser\PhpData;
use SchrodtSven\ApiClient\Text\Parser\Entity\PhpType;
use stdClass;

class GenericJson implements ParserInterface
{
   
    private mixed $preParsed;
    private ArrayClass $firstLevelPreparsedTree;
    private array $firstLevelKeys;
    private array $matchName = [];

    public function __construct(private string $rawJson)
    {
        $this->preParsed = json_decode($rawJson);
        $this->initParsing();
            
    }

    public function reset(mixed $content): self
    {
        $this->preParsed = $content;
        $this->initParsing();
        return $this;
    }

    public function getNameMatchingArray(): ArrayClass
    {
        $match = new ArrayClass();
        for($i=0; $i<count($this->firstLevelKeys);$i++) {
             $new = (new StringClass($this->firstLevelKeys[$i]));
             if ($new->contains('_')) {
                $match[$this->firstLevelKeys[$i]] = (string) $new->camelize();
             } 
        }

        return $match;
    }

    public function getTypeMatchingArray(): ArrayClass
    {
        $match = new ArrayClass();
        for($i=0; $i<count($this->firstLevelKeys);$i++) {
            $key = $this->firstLevelKeys[$i];
            $raw = $this->preParsed->$key;
            
             $type = new PhpType;
             $type->setName($key);
             $type->setType((new Matcher)->toNativeType(gettype($raw))); 
             if($type->getType() ==='object')
                             $type->setClass($raw::class); 
             $match[$key] = $type;               
        }

        return $match;
    }

    public function getPreparsed(): mixed
    {
        return $this->preParsed;

    }
    public function getFirstLevelKeys(): array
    {
        return array_keys(get_object_vars($this->preParsed));
    }

    protected function initParsing(): void
    {
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

    public function getFirstLevelProperty(string $name): mixed
    {
        return ($this->preParsed->$name) ?? null;
    }

    public function preparseContent(string $separator): ArrayClass
    {
        //@FIXME
        return new ArrayClass();
    }
   
}