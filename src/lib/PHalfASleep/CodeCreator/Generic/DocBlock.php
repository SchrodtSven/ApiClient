<?php declare(strict_types=1);
/**
 * Creating DocBlock partlets for several languages
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-13
 */


namespace SchrodtSven\PHalfAsleep\CodeCreator\Generic;

use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\PHalfAsleep\Data\Text\StringLiteral;


class DocBlock
{

    public const DEFAULT_INDENT_SIZE = 0;

    public const DEFAULT_INDENT_FACTOR = 4;

    public int $currentIndentSize = self::DEFAULT_INDENT_SIZE;

    public int $currentIndentFactor = 4;

    public const DOC_BLOCK_FRAME_GENERAL = '%1$s/**%2$s'
        . '%1$s * %3$s%2$s'
        . '%1$s * %2$s'
        . '%4$s%2$s'
        . '%1$s */%2$s%2$s';

    public const TAG_LINE = '%1$s * @%2$s %3$s';



    public function __construct(private ?StringClass $description = null, private ?ArrayClass $tags = null)
    {
        if (is_null($this->tags)) {
            $this->flush();
        } else {
            $this->sanitize($tags);
        }

        if(is_null($description)) {
            $this->description = new StringClass('');
        }
    }

    private function sanitize(ArrayClass $content)
    {
        //@fixme
    }
    public function flush(): self

    {
        $this->tags = new ArrayClass([]);
        $this->description = new StringClass('');
        return $this;
    }



    public function addTag(string $tag, string $value): self
    {
        $this->tags->push(sprintf(
                            self::TAG_LINE,
                            $this->getIndentCharacters(),
                            $tag,
                            $value)
        );
        return $this;
    }

    public function setDescriptionAsString(string $description): self
    {
        $this->description->set($description);
        return $this;
    }

    public function getIndentCharacters(): string
    {
        return str_repeat(' ', $this->currentIndentFactor * $this->currentIndentSize);
    }

    public function getDocBlock(string $description, string $main): string
    {
        return sprintf(self::DOC_BLOCK_FRAME_GENERAL, $this->getIndentCharacters(), PHP_EOL, $description, $main);
    }

    public function getVarDeclarationBlock(string $name, string $type = 'string', ?string $value = null): string
    {
        $space = $this->getIndentCharacters();
        return $this->getDocBlock($space, 'FOO variable', sprintf(self::TAG_LINE, $space, 'var', PHP_EOL));
    }

    /**
     * Get the value of currentIndentSize
     *
     * @return int
     */
    public function getCurrentIndentSize(): int
    {
        return $this->currentIndentSize;
    }

    /**
     * Set the value of currentIndentSize
     *
     * @param int $currentIndentSize
     *
     * @return self
     */
    public function setCurrentIndentSize(int $currentIndentSize): self
    {
        $this->currentIndentSize = $currentIndentSize;

        return $this;
    }

    public function increaseIndentSize(int $plus = 1): self
    {
        $this->currentIndentSize += $plus;
        return $this;
    }

    public function decreaseIndentSize(int $minus = 1): self
    {
        $this->currentIndentSize -= $minus;
        $this->currentIndentSize = ($this->currentIndentSize < 0) ? 0 : $this->currentIndentSize;

        return $this;
    }

    /**
     * Get the value of currentIndentFactor
     *
     * @return int
     */
    public function getCurrentIndentFactor(): int
    {
        return $this->currentIndentFactor;
    }

    /**
     * Set the value of currentIndentFactor
     *
     * @param int $currentIndentFactor
     *
     * @return self
     */
    public function setCurrentIndentFactor(int $currentIndentFactor): self
    {
        $this->currentIndentFactor = $currentIndentFactor;

        return $this;
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function render(): string
    {
        return sprintf(self::DOC_BLOCK_FRAME_GENERAL, 
                       $this->getIndentCharacters(),
                       PHP_EOL,
                       $this->description,
                       $this->tags->join(PHP_EOL)); 
    }

    

    /**
     * Get the value of content
     */
    public function getTags(): ArrayClass
    {
        return $this->tags;
    }

    /**
     * Set the value of content
     */
    public function setTags(ArrayClass $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): StringClass
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(StringCLass $description): self
    {
        $this->description = $description;

        return $this;
    }
}
