<?php declare(strict_types=1);
/**
 * Trait for classes tranfsorming string content between diffferent: 
 * - cases 
 * - (standard) formats
 * - ... tbc.
 * 
 * @FIXME  && @relaunchMe- use self::$content (WHERE possible)
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-09
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Type\Dry;

trait StringTransformerTrait
{

     /**
     * Splitting string at boundary sub string (default:)
     * into substrings
     *
     * @param string $string
     * @return array
     */
    public  function splitAtBoundary(string $string, string $boundary = '_'): array
    {
        return explode($boundary, $string);
    }

    /**
     * Getting camelCased | CamelCased string from string with common boundary sub string
     *
     * @param string $string
     * @param string $boundary
     * 
     * @deprecated
     * @return string
     */
    public  function getCamelCasedString(string $string, bool $upperFirst = false, string $boundary = '_'): string
    {
        $tmp = $this->splitAtBoundary($string, $boundary);

        for ($i = 0; $i < count($tmp); $i ++) {
            $tmp[$i] = ucfirst(strtolower($tmp[$i]));
        }
        $glued = implode('', $tmp);
        return ($upperFirst) ? $glued : lcfirst($glued);
    }


    public  function camelize(bool $upperFirst = false, string $boundary = '_'): self
    {
        $tmp = $this->splitAtBoundary($this->content, $boundary);

        for ($i = 0; $i < count($tmp); $i ++) {
            $tmp[$i] = ucfirst(strtolower($tmp[$i]));
        }
        $glued = implode('', $tmp);
        $this->content =  ($upperFirst) ? $glued : lcfirst($glued);;
        return $this;
    }
    
    public  function getsnakeCasedString(string $string, bool $lowercase= true): self
    {
        return new self( implode('_', $this->splitAtUpperCasedSubstring($string)));
    }
    
    /**
     * Encodig string for usage as URI (part) 
     * 
     * @see https://www.php.net/manual/de/function.urlencode.php
     * @see https://www.php.net/manual/de/function.rawurlencode.php
     * @see http://www.faqs.org/rfcs/rfc3986
     * @param string $string
     * @param bool $accordingRfc3986
     * @return string
     */
    public  function getUrlEncoded(string $string, bool $accordingRfc3986=false) : self
    {
        $content = ($accordingRfc3986) ? rawurldecode($string) : urlencode($string);
        return new self($content);
    }
}