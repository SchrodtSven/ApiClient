<?php
/**
 * Some examples with printf* 
 *
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-04-13
 */
use SchrodtSven\ApiClient\Frontend\Html\General;

$template = "
    /**
     * Generating form element 
     * <code>
     * <input type=\"%1\$s\">
     * <code>
     *
     * @param string \$name
     * @param string \$value
     * @param array \$attribs
     * @param string \$label
     * @return Element
     */
    public function get%2\$s(string \$name, string \$value='', array \$attribs=[], string \$label =''): Element
    {
        return \$this->getInput(\$name, '%1\$s', \$value, \$attribs, \$label);
    }
";


foreach(General::INPUT_TYPES as $type) {

    echo sprintf($template, $type, ucfirst($type));
}
