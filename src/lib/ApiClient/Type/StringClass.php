<?php declare(strict_types=1);
/*
 * Class representing strings as instances
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-09
 */

namespace SchrodtSven\ApiClient\Type;
use SchrodtSven\PHalfAsleep\Data\Text\StringLiteral;
use SchrodtSven\ApiClient\Type\Dry\StringTransformerTrait;
use SchrodtSven\ApiClient\Type\Dry\MultibyteStringTrait;
use SchrodtSven\ApiClient\Type\Dry\RegExTrait; 

class StringClass
{
    use StringTransformerTrait;
    use MultibyteStringTrait;
    use RegExTrait;

    public const TRIM_CHARS = ' \n\r\t\v\x00';

    public function __construct(private string $content = '')
    {
        
    }

    public static function createFromFileContent(string $file): self
    {
        //@FIXME
        // 
        if (!file_exists($file)) {}

        return new self(file_get_contents($file));
    }

    public function splitBy(string $separator = ' '): ArrayClass
    {
        return new ArrayClass(explode($separator, $this->content));
    }

   public function splitAtWhitespace(): ArrayClass
   {
        return $this->splitByRegEx(self::WHITESPACE);
   }

    public function trim(string $characters = self::TRIM_CHARS): self
    {
        $this->content = trim($this->content);
        return $this;
    }

    public function __toString(): string
    {
        return $this->raw();
    }

    public function set(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function toUpper(): self
    {
        $this->content = strtoupper($this->content);
        return $this;
    }

    public function toLower(): self
    {
        $this->content = strtolower($this->content);
        return $this;
    }

    public function upperFirst(): self
    {
        $this->content = ucfirst($this->content);
        return $this;
    }

    public function lowerFirst(): self
    {
        $this->content = lcfirst($this->content);
        return $this;
    }


    public function contains(string $needle): bool
    {

        return str_contains($this->content, $needle);
    }

    public function begins(string $needle): bool
    {

        return str_starts_with($this->content, $needle);
    }

    public function ends(string $needle): bool
    {

        return str_ends_with($this->content, $needle);
    }

    public function replace(string|array $search, string|array $replace): self
    {
        $this->content = str_replace($search, $replace, $this->content);
        return $this;
    } 

    public function prepend(string $str): self
    {
        $this->content = $str . $this->content;
        return $this;
    }

    public function append(string $str): self
    {
        $this->content = $this->content . $str;
        return $this;
    }

    public function quote(string $sign = "'"): self
    {
        $this->append($sign)->prepend($sign);
        return $this;
    }

    public function embrace(string $before ='(', string $after = ')'): self
    {
        $this->prepend($before)->append($after);
        return $this;
    }

    public function quoteTypographic(string $begin = StringLiteral::TYPOGRAPHIC_QUOTE_DOUBLE_OPEN, 
                                     string $end = StringLiteral::TYPOGRAPHIC_QUOTE_DOUBLE_CLOSE): self
    {
        $this->embrace($begin, $end);
        return $this;
    }

    public function pos(string $needle, int $offset = 0, ?string $encoding = null): int | bool
    {
        return mb_strpos($this->content, $needle, $offset, $encoding);
    }

    public function getBetween(string $start, string $end, int $offset = 0, ?string $encoding = null): mixed
    {
        $txt ='';

        $st = $this->pos($start);
        $en = $this->pos($end); //mb_strpos($this->content, $end, $offset, $encoding);
       /* var_dump([
                    "
                    $start ($st) - 
                    $end ($en)
                    {$this->content}
                    0123456789012345678901234567890
                    "
        ]);

    */        
//@FIXME catch error!!!
        return $this->subString($st+1, $en-$st-1);
    }

    public function raw(array $options = []): string
    {
        return $this->content;
    }

    public function pad(int $length, string $padString = " ", int $padType = STR_PAD_BOTH, ?string $encoding = null): self
    {
        $this->content = mb_str_pad($this->content, $length, $padString, $padType, $encoding);
        return $this;
    }
}