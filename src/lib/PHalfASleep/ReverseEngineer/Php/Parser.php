<?php declare(strict_types=1);
/**
 * Parser for existing PHP source code snippets
 * 
 * 
 * @FIXME  && @relaunchMe- use self::$content (WHERE possible)
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-24
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\PHalfAsleep\ReverseEngineer\Php;

use SchrodtSven\ApiClient\Frontend\StyleSheet\Declaration;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\PHalfAsleep\Data\Text\StringLiteral;
use Stringable;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Language;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Entity\Variable; 
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Entity\Procedure;

class Parser
{
    public function analyzeSignatureList(ArrayClass $list)
    {
        $return = new ArrayClass();
        for ($i = 0; $i < count($list); $i++) {
            $return->push($this->analyzeVariableDeclaration($list[$i]));
        }
        return $return;
    }

    public function analyzeVariableDeclaration(StringClass $declaration): Variable
    {
        $this->checkSyntaxSanity($declaration);
        $nullable = ($declaration->pos('?', 0) === 0) ? true : false;
        $default = null;
        //var_dump($nullable);die;
        if($nullable) {
            $declaration = $declaration->trim()->subString(1);
        }
        
        if($declaration->contains('=')) {
            $tmp1 = $declaration->splitBy('=')->toStringClass();
            $default = $tmp1[1]->trim();
            $declaration = $tmp1[0]->trim();
        }

        $tmp2 = $declaration->splitBy(' ')->toStringClass();
 
        switch(count($tmp2)) {
                            case 1: 
                                    $type = '';
                                    $name = $tmp2[0]->trim()->subString(1)->trim(); 
                                    break;
                            default:
                                    $name = $tmp2[1]->trim()->subString(1);
                                    $type = $tmp2[0]->trim(); 
                                

        }
        
        return new Variable($name, $type, (bool) $nullable, false, '', $default);

        //return new Variable();
    }

    /**
     * Analyzing (preparsed) function declaration  --> 'trimmed' one liner!!
     *
     * @param StringClass $declaration
     * @return ArrayClass
     */
    public function analyzeFunctionDeclaration(StringClass $declaration): Procedure
    {
        // die($declaration);
        $result = new Procedure();
        
        $tmp = $declaration->splitBy(':')->toStringClass();
        $tmp2 = $tmp[0]->splitBy(' ')->toStringClass();
        //var_dump($tmp2);die;
        //$proc = new Procedure($tmp);



        $result->setSignature($tmp[0]);
        $sig = $result->getSignature()
                            ->getBetween(StringLiteral::OPEN_PARENTHESIS, 
                                         StringLiteral::CLOSE_PARENTHESIS); 

        $result->setSignature($sig);

        $tmp3 = $result->getSignature()
                                        ->splitBy(', ')
                                        ->toStringClass();
        
       $result->setVariables($this->analyzeSignatureList($tmp3));

        $result->setType($tmp[1]);

       
        return $result;
    }


    public function preparse(string|\Stringable $code): StringClass
    {
        //@FIXME -->do pre-parsing incl. reducing code fragment to one line
        return (new StringClass($code));
    }

    public function checkSyntaxSanity(StringClass $code, string $codeType = Language::VARIABLE_DECLARATION): bool
    {
        return true;
    }
}
