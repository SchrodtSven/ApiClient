<?php

declare(strict_types=1);
/*
 * Class representing PHP's native types
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

class Native
{
    const STATIC = 1;

    const VISIBILTY = ['public' => 2, 3 => 'protected', 4 => 'private'];
}
