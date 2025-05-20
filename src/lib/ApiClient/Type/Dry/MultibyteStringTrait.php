<?php declare(strict_types=1);
/**
 * Trait wrapping PHP native multibyte (mb_*) string functions
 * 
 * 
 * @see https://www.php.net/manual/en/book.mbstring.php
 * 
 * @FIXME  && @relaunchMe- use self::$content (WHERE possible)
 * 
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-23
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\Type\Dry;

use SchrodtSven\ApiClient\Type\StringClass;

trait MultibyteStringTrait
{
   public function split(int $length = 1, ?string $encoding = null): array
   {
      return mb_str_split($this->content, $length, $encoding);
   }

   public function subString(int $offset, ?int $length = null, ?string $encoding = null): StringClass
   {
      return new StringClass(mb_substr($this->content, $offset, $length, $encoding));
   }
}
