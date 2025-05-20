<?php declare(strict_types=1);
/**
 *  Class reprensting PHP native functions / methods / invokables
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-24
 */

namespace SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Entity;

use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec\Language;
use Stringable;

class AbstractEntity
{
    protected StringClass $name;
    protected StringClass $type;

    /**
     * Entity's visibility - element of Language::VISIBILTY | null
     *
     * @var StringClass
     */
    protected StringClass $visibility;


    public function __construct(
        string | \Stringable $name = '',
        string | \Stringable $type = '',
        protected bool $isNullable = false,
        protected bool $isStatic = false,
        string | \Stringable $visibility = '',
        protected mixed $default = null
    ) {
        $this->name = $this->stringClassyMe($name);
        $this->type = $this->stringClassyMe($type);
        $this->visibility = $this->stringClassyMe($visibility);
        $this->init();
    }

    protected function init(): void
    {
    }

    public function stringClassyMe(Stringable | string $me): StringClass
    {
        return ($me instanceof StringClass) ? $me
            : new StringClass((string) $me);
    }
}
