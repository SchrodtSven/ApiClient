<?php declare(strict_types=1);
/**
 * Iterator class for parsing plain text by
 * 
 *  - given RuleSetInterface
 *  - given ParserInterface
 * 
 * automatically
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-17
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Text\Parser;
use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\ApiClient\Text\Parser\IteratorInterface;
use SchrodtSven\ApiClient\Text\Parser\ParserInterface;
use SchrodtSven\ApiClient\Text\Parser\RuleSetInterface;

class PlainTextIterator implements IteratorInterface
{
    


    
    public function __construct(private ParserInterface $parser, 
                                private RuleSetInterface $ruleSet)
    {

    }

    

    public function walk(): mixed
    {
        $preParsed = $this->parser->preparseContent('::');

        for($i =0;$i<count($preParsed);$i++) {
            print_r($preParsed[$i]);
            // $line = (new StringClass($item))->trim();
             
            /* echo $preParsed[$i][0];
            if(isset($preParsed[$i][1]))
                echo '::' . $preParsed[$i][1];
             echo PHP_EOL;
             */
            
             //var_dump($item->shift()) ;
            
            //die;
        }
        
        return true;
    }

}

