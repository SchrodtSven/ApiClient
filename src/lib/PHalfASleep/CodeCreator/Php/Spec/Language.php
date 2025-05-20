<?php declare(strict_types=1);
/**
 * Holding language parts as constants for templating with <code>*printf</code> functions
 * or persisting key words
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-13
 */

namespace SchrodtSven\PHalfAsleep\CodeCreator\Php\Spec;

class Language
{
    // indent | identifier | value

    public const FILE_OPENER = "<?php declare(strict_types=1)";

    public const FILE_OPENER_LEGACY = "<?php";

    public const ASSIGNMENT = '%s $%s = %s;';

    public const VISIBILITY = ['public', 'protected', 'private'];

    public const STATIC = 'static';

    public const VARIABLE_DECLARATION = 'VAR_DEC';

    public const FUNCTION_DECLARATION = 'FUNC_DEC';

    public const PROCEDURE_KIND = ['METHOD', 'FUNCTION', 'CLOSURE'];




}