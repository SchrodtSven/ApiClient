<?php declare(strict_types=1);
/**
 *  Class creating simple HTML structures from given plain text strings
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-15
 */

namespace SchrodtSven\ApiClient\App\Frontend;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\App\Frontend\HtmlElement;


class HtmlDecorator
{


    private StringClass $content;

    public function __construct(string $text='')
    {
        $this->content = new StringClass($text);
    }

    public function setContentAsString(string $content)
    {
        $this->content = new StringClass();
    }

    public function getElement(string $name, $attributes): string
    {
        
        return (string) new HtmlElement($name, $this->content, $attributes);
    }



}