<?php declare(strict_types=1);
/**
 * Entity class for HTML attributes 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.25
 * @since 2025-01-15
 */

namespace SchrodtSven\ApiClient\App\Frontend;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\ApiClient\Type\ArrayClass;

class HtmlCollectionTpl
{
    public const BLOCKQUOTE = '<figure>
    <blockquote cite="%s">
        <p>%s</p>
    </blockquote>
    <figcaption>— %s, <cite>%s</cite></figcaption>
</figure>';



}

