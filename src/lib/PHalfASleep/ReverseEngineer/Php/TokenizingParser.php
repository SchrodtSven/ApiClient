<?php declare(strict_types=1);
/**
 * Parser for existing PHP source code snippets using PHP' native \Tokenizer
 * 
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-27
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\PHalfAsleep\ReverseEngineer\Php;


use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\PHalfAsleep\Data\Text\StringLiteral;
use Stringable;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Language;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Entity\Variable; 
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Entity\Procedure;
use SchrodtSven\ApiClient\Generic\Dry\TypeSanitizer; 

class TokenizingParser
{
    private StringClass $source;
    private TypeSanitizer $sanitizer;

    private ArrayClass $tokenTree;

    private ArrayClass $preparsedTree;

    public function __construct(\Stringable | string $source)
    {
        $this->sanitizer = new TypeSanitizer();
        $this->source = $this->sanitizer->stringClassyMe($source);
        $this->sanitize();
        $this->tokenTree = new ArrayClass(\PhpToken::tokenize((string) $this->source));
        $this->preparse();
    }

    private function sanitize(): void
    {
        if(!$this->source->begins(Language::FILE_OPENER))
                                            $this->source->prepend(Language::FILE_OPENER . ' ');
    }

    private function preparse (array $ignore = [T_COMMENT, T_DOC_COMMENT, T_WHITESPACE]): void
    {
        $this->preparsedTree = new ArrayClass();
        for($i=0; $i<count($this->tokenTree);$i++) {
            if( in_array($this->tokenTree[$i]->id, $ignore))
                                                            continue;
                                                            
            $this->preparsedTree->push($this->tokenTree[$i]);
        }
    }


    /**
     * Get the value of source
     *
     * @return StringClass
     */
    public function getSource(): StringClass
    {
        return $this->source;
    }

    /**
     * Set the value of source
     *
     * @param StringClass $source
     *
     * @return self
     */
    public function setSource(StringClass $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get the value of tokenTree
     *
     * @return ArrayClass
     */
    public function getTokenTree(): ArrayClass
    {
        return $this->tokenTree;
    }

    /**
     * Set the value of tokenTree
     *
     * @param ArrayClass $tokenTree
     *
     * @return self
     */
    public function setTokenTree(ArrayClass $tokenTree): self
    {
        $this->tokenTree = $tokenTree;

        return $this;
    }

    /**
     * Get the value of preparsedTree
     *
     * @return ArrayClass
     */
    public function getPreparsedTree(): ArrayClass
    {
        return $this->preparsedTree;
    }

    /**
     * Set the value of preparsedTree
     *
     * @param ArrayClass $preparsedTree
     *
     * @return self
     */
    public function setPreparsedTree(ArrayClass $preparsedTree): self
    {
        $this->preparsedTree = $preparsedTree;

        return $this;
    }
}
