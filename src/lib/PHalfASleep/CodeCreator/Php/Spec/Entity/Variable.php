<?php declare(strict_types=1);
/**
 *  Class representing PHP native variable / instance member (property)
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-24
 */

namespace SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Entity;

use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Language;
use Stringable;

class Variable extends AbstractEntity
{
    private const TO_STRING_TPL  = '%s%s $%s %s';




    /**
     * Get the value of name
     */
    public function getName(bool $nameOnly = true): Stringable | string
    {
        return ($nameOnly) ? $this->name
            : '$' . $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(Stringable | string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType(): Stringable | string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType(Stringable | string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of isNullable
     */
    public function getIsNullable(): bool
    {
        return $this->isNullable;
    }

    /**
     * Set the value of isNullable
     */
    public function setIsNullable(bool $isNullable): self
    {
        $this->isNullable = $isNullable;

        return $this;
    }

    /**
     * Get the value of default
     */
    public function getDefault(): mixed
    {
        return $this->default;
    }

    /**
     * Set the value of default
     */
    public function setDefault(mixed $default): self
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @deprecated version
     *
     * @return string
     */
    public function __toString__(): string
    {
        return sprintf(
            self::TO_STRING_TPL,
            $this->name,
            $this->type,
            $this->isNullable,
            $this->default
        );
    }

    public function __toString(): string
    {
        return (string) $this->getDeclaration();
    }

    public function getDeclaration(bool $native = false): StringClass
    {
        return  new StringClass(
            sprintf(
                self::TO_STRING_TPL,
                ($this->isNullable) ? '?' : '',
                $this->type,
                $this->name,
                ($this->default) ? ' = ' . $this->default : ''
            )
        );
    }
}
