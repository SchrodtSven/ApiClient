<?php

declare(strict_types=1);
/**
 * AttributeSelector - class representing attribute selector(s)
 *
 *  <code>
 * font-family: Comic sans, Gargoyle
 *  </code>
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-24
 */

namespace SchrodtSven\ApiClient\Frontend\StyleSheet;

use SchrodtSven\ApiClient\Type\StringClass;

class AttributeSelector
{

    /**
     * [attrOPERATORvalue] generic attribute selector
     *@var string [%s%s%s]
     */
    public const SELECTOR_PATTERN_GENERIC = '[%s%s%s]';

    /**
     * [attr] Represents elements with an attribute name of attr.
     *
     *@var string [%s]
     */
    public const SELECTOR_PATTERN_HAS_ATTRIBUTE = '[%s]';

    /**
     * [attr=value] Represents elements with an attribute name of attr whose value is exactly value.
     *
     *@var string [%s=%s]
     */
    public const SELECTOR_PATTERN_ATTR_EQ_VALUE = '[%s=%s]';

    /**
     * [attr~=value] Represents elements with an attribute name of attr whose value is a whitespace-separated list of words, one of which is exactly value.
     *
     *@var string [%s~=%s]
     */
    public const SELECTOR_PATTERN_ATTR_CONTAINS_VALUE = '[%s~=%s]';

    /**
     * [attr|=value] Represents elements with an attribute name of attr whose value can be exactly value or can begin with value immediately followed by a hyphen, - (U+002D). It is often used for language subcode matches.
     *
     *@var string [%s|=%s]
     */
    public const SELECTOR_PATTERN_ATTR_VALUE_BEGINS_HYPHEN = '[%s|=%s]';

    /**
     * [attr^=value] Represents elements with an attribute name of attr whose value is prefixed (preceded) by value.
     *
     *@var string [%s^=%s]
     */
    public const SELECTOR_PATTERN_ATTR_VALUE_BEGINS = '[%s^=%s]';

    /**
     * [attr$=value] Represents elements with an attribute name of attr whose value is suffixed (followed) by value.
     *
     *@var string [%s$=%s]
     */
    public const SELECTOR_PATTERN_ATTR_VALUE_ENDS = '[%s$=%s]';

    /**
     * [attr*=value] Represents elements with an attribute name of attr whose value contains at least one occurrence of value within the string.
     *
     *@var string [%s*=%s]
     */
    public const SELECTOR_PATTERN_ATTR_VALUE_CONTAINS_LEAST = '[%s*=%s]';


    /**
     * Selector for existing $attribute
     * @param string $attribute
     * @return string
     */
    public function has(string $attribute): StringClass
    {
        return new StringClass(sprintf(self::SELECTOR_PATTERN_HAS_ATTRIBUTE, $attribute));
    }

    /**
     * Selector for existing $attribute with value equal to $value
     * @param string $attribute
     * @param string $value
     * @return string
     */
    public function equals(string $attribute, string $value): StringClass
    {
        return new StringClass(sprintf(self::SELECTOR_PATTERN_ATTR_EQ_VALUE, $attribute, $value));
    }

    /**
     * Selector for existing $attribute with value containing $value
     *
     * @param string $attribute
     * @param string $value
     * @return string
     */
    public function contains(string $attribute, string $value): StringClass
    {
        return new StringClass(sprintf(self::SELECTOR_PATTERN_ATTR_CONTAINS_VALUE, $attribute, $value));
    }

    /**
     * Selector for existing $attribute with value starting with $value
     *
     * @param string $attribute
     * @param string $value
     * @return string
     */
    public function begins(string $attribute, string $value): StringClass
    {
        return new StringClass(sprintf(self::SELECTOR_PATTERN_ATTR_VALUE_BEGINS, $attribute, $value));
    }

    /**
     * Selector for existing $attribute with value ending with $value
     *
     * @param string $attribute
     * @param string $value
     * @return string
     */
    public function ends(string $attribute, string $value): StringClass
    {
        return new StringClass(sprintf(self::SELECTOR_PATTERN_ATTR_VALUE_ENDS, $attribute, $value));
    }

    /**
     * Generic selector
     *
     * @param string $attribute
     * @param string $operator
     * @param string $value
     * @return string
     */
    public function generic(string $attribute, string $operator, string $value): StringClass
    {
        return new StringClass(sprintf(self::SELECTOR_PATTERN_GENERIC, $attribute, $value));
    }

}