<?php declare(strict_types=1);
/**
 * Defining public API for rule sets, controlling parser iterators
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-17
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Text\Parser;

class PlainTextRuleSet implements RuleSetInterface
{
    public const ACTIONS = ['splitBy'];
}