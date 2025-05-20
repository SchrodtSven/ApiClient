<?php declare(strict_types=1);
/**
 * Entity class representing type of given PHP data (structure)
 * 
 *  - scalar 
 *  - array
 *  - class instances 
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-17
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Text\Parser\Entity;

class PhpType
{
    public const TYPES = ['scalar', 'array', 'instance'];
    
    private string $name;

    private string $type;  // 

    private ?string $class = null;

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of class
     *
     * @return ?string
     */
    public function getClass(): ?string
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @param ?string $class
     *
     * @return self
     */
    public function setClass(?string $class): self
    {
        $this->class = $class;

        return $this;
    }
}