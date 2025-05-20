<?php declare(strict_types=1);
/**
 * Class managing 
 *
 *
 * @TODO DI-Container 4 cfg
 *
 * @FIXME reacting on http status code !== HttpProtocol::STATUS_CODE_OK
 *
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-09
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\App;

class Config
{
    private string $privateKey = 'YOUR_PRIVATE_KEY';

    private string $publicKey = 'YOUR_PUBLIC_KEY';
}