<?php declare(strict_types=1);
/**
 * Trait for generic functionality to be used within Provider' URI builders
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-12
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Dry;

trait UriBuilderTrait
{
    public function getQueryString(): string
    {
        return http_build_query($this->currentQueryStringParameter);
    }

    public function getEndpointUri(): string
    {
        return $this->currentEndpoint . '?' . $this->getQueryString();
    }

}