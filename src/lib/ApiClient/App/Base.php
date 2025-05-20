<?php declare(strict_types=1);
/**
 * Base class of application 
 *
 *
 * @package ApiClient
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2025-01-09
 * @link https://github.com/SchrodtSven/ApiClient
 */

namespace SchrodtSven\ApiClient\App;

class Base
{
    private const RUN_MODES = ['local_priv', 'server_pub'];
    private $runMode = 'local_priv';

    public function __construct()
    {
        $cfg = match($this->runMode) {
            'local_priv' => 'ConfigPriv',
            'server_pub' => 'Config',

        };
        
    }


}