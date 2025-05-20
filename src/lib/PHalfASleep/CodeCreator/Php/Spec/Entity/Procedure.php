<?php

declare(strict_types=1);
/**
 *  Class representing PHP native functions / methods / invokables
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-24y
 */

namespace SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Entity;

use SchrodtSven\ApiClient\Type\ArrayClass;

use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Language;
use Stringable;

class Procedure extends AbstractEntity
{
    protected const TO_STRING_TPL  = '$kind: %s, name: %s, type: %s, signature: %s';

    public const TOKEN = 'function';

    protected StringClass $content;
    protected bool $isStatic = false;

    protected StringClass $signature;

    protected ArrayClass $variables;


    protected function init(): void
    {
        if (!isset($this->variables)) $this->variables = new ArrayClass();
    }

    /**
     * Get the value of name
     */
    public function getName(): StringClass
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(Stringable | string $name): self
    {
        $this->name = $this->stringClassyMe($name);

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType(): StringClass
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType(Stringable | string $type): self
    {
        $this->type = $this->stringClassyMe($type);

        return $this;
    }

    /**
     * Get the value of signature
     */
    public function getSignature(): StringClass
    {
        return $this->signature;
    }

    /**
     * Set the value of signature
     */
    public function setSignature(Stringable | string $signature): self
    {
        $this->signature = $this->stringClassyMe($signature);

        return $this;
    }

    /**
     * Get the value of content
     *
     * @return string
     */
    public function getContent(): StringClass
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @param string $content
     *
     * @return self
     */
    public function setContent(Stringable | string $content): self
    {
        $this->content = $this->stringClassyMe($content);

        return $this;
    }

    public function __toString(): string
    {
        $name = ($this->isStatic) ? Language::STATIC . ' ' . $this->name
            : $this->name;

        return sprintf(
            '%s %s %s:%s',
            $this->getProceduereStart(),
            $name,
            $this->toSignature(),
            $this->type

        );
    }

    /**
     * Get the value of isStatic
     *
     * @return bool
     */
    public function getIsStatic(): bool
    {
        return $this->isStatic;
    }

    /**
     * Set the value of isStatic
     *
     * @param bool $isStatic
     *
     * @return self
     */
    public function setIsStatic(bool $isStatic): self
    {
        $this->isStatic = $isStatic;

        return $this;
    }

    /**
     * Adding instance of Variable
     *
     * @param Variable $variable
     * @return self
     */
    public function addVariable(Variable $variable): self
    {
        $this->variables->push($variable);
        return $this;
    }

    /**
     * Get the value of variables
     *
     * @return ArrayClass
     */
    public function getVariables(): ArrayClass
    {
        return $this->variables;
    }

    /**
     * Set the value of variables
     *
     * @param ArrayClass $variables
     *
     * @return self
     */
    public function setVariables(ArrayClass $variables): self
    {
        $this->variables = $variables;

        return $this;
    }

    /**
     * Get the value of visibility
     *
     * @return StringClass
     */
    public function getVisibility(): StringClass
    {
        return $this->visibility;
    }

    /**
     * Set the value of visibility
     *
     * @param StringClass $visibility
     *
     * @return self
     */
    public function setVisibility(StringClass $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function toSignature(): StringClass
    {
        return $this->getVariables()->join(', ')
            ->embrace();
    }

    protected function getProceduereStart(): string
    {
        return sprintf(
            '%s',
            self::TOKEN 
            . ($this->isStatic) ? Language::STATIC : '' 
            . (string) $this->visibility

        );
    }
}
