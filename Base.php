<?php declare(strict_types=1);
/**
 *  
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-13
 */

namespace SchrodtSven\ApiClient\App;

class Base
{
    private bool $useCustomTypes = true;
    

    /**
     * Get the value of useCustomTypes
     *
     * @return bool
     */
    public function getUseCustomTypes(): bool
    {
        return $this->useCustomTypes;
    }

    /**
     * Set the value of useCustomTypes
     *
     * @param bool $useCustomTypes
     *
     * @return self
     */
    public function setUseCustomTypes(bool $useCustomTypes): self
    {
        $this->useCustomTypes = $useCustomTypes;

        return $this;
    }
}