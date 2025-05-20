<?php declare(strict_types=1);
/**
 * HTML syntax describing class
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.25
 * @since 2025-01-15
 */

namespace SchrodtSven\ApiClient\App\Frontend;

class HtmlSyntax
{
    /**
     * Template for non-empty element
     * 
     * @var string
     */
    public const ELEMENT_TPL = '<%s%s>%s</%s>';

    /**
     * Template for non-empty element      
     *  
     * @var string
     */
    public const EMPTY_ELEMENT_TPL = '<%s%s />';

    /**
     * Template for non-empty element multi lined
     * 
     * @FIXME -> format/beautify
     * @var string
     */
    public const ELEMENT_TPL_MULTI = '<%s%s>
    %s
    </%s>';

    /**
     * Template for attribute assignment - example:
     * <code>
     * 
     * name = "value"
     * 
     * </code>
     * 
     * @var string
     */
    public const ATTRIB_ASSIGN = '%s = "%s"';

    /**
     * Valid attribute values for <input type="$VALUE">
     * 
     * @var array
     */
    public const INPUT_TYPES = ['button', 'checkbox', 'color', 'date', 'datetime-local', 'email', 'file', 'hidden', 'image', 
                                'month', 'number', 'password', 'radio', 'range', 'reset', 'search', 'submit', 'tel', 'text', 
                                'time', 'url', 'week'];

    /** 
     * Mapping attributes to elements
     * 
     * @var array
     */
    public const ATTRIBUTE_TO_ELEMENT = [
                                            'accept ' => ['form', 'input'],
                                            'accept-charset ' => ['form'],
                                            'action ' => ['form'],
                                            'align ' => ['caption', 'col', 'colgroup', 'hr', 'iframe', 'img', 'table', 'tbody', 'td', 'tfoot', 'th', 'thead', 'tr'],
                                            'allow ' => ['iframe'],
                                            'alt ' => ['area', 'img', 'input'],
                                            'async ' => ['script'],
                                            'autocomplete ' => ['form', 'input', 'select', 'textarea'],
                                            'autofocus ' => ['button', 'input', 'select', 'textarea'],
                                            'autoplay ' => ['audio', 'video'],
                                            'buffered ' => ['audio', 'video'],
                                            'capture ' => ['input'],
                                            'charset ' => ['meta', 'script'],
                                            'checked ' => ['input'],
                                            'cite ' => ['blockquote', 'del', 'ins', 'q'],
                                            'color ' => ['font', 'hr'],
                                            'cols ' => ['textarea'],
                                            'colspan ' => ['td', 'th'],
                                            'content ' => ['meta'],
                                            'controls ' => ['audio', 'video'],
                                            'coords ' => ['area'],
                                            'crossorigin ' => ['audio', 'img', 'link', 'script', 'video'],
                                            'csp Experimental ' => ['iframe'],
                                            'data ' => ['object'],
                                            'datetime ' => ['del', 'ins', 'time'],
                                            'decoding ' => ['img'],
                                            'default ' => ['track'],
                                            'defer ' => ['script'],
                                            'dirname ' => ['input', 'textarea'],
                                            'disabled ' => ['button', 'fieldset', 'input', 'optgroup', 'option', 'select', 'textarea'],
                                            'download ' => ['a', 'area'],
                                            'enctype ' => ['form'],
                                            'enterkeyhint Experimental ' => ['textarea', 'contenteditable'],
                                            'for ' => ['label', 'output'],
                                            'form ' => ['button', 'fieldset', 'input', 'label', 'meter', 'object', 'output', 'progress', 'select', 'textarea'],
                                            'formaction ' => ['input', 'button'],
                                            'formenctype ' => ['button', 'input'],
                                            'formmethod ' => ['button', 'input'],
                                            'formnovalidate ' => ['button', 'input'],
                                            'formtarget ' => ['button', 'input'],
                                            'headers ' => ['td', 'th'],
                                            'height ' => ['canvas', 'embed', 'iframe', 'img', 'input', 'object', 'video'],
                                            'high ' => ['meter'],
                                            'href ' => ['a', 'area', 'base', 'link'],
                                            'hreflang ' => ['a', 'link'],
                                            'http-equiv ' => ['meta'],
                                            'integrity ' => ['link', 'script    Specifies a Subresource Integrity value that allows browsers to verify what they fetch.'],
                                            'inputmode ' => ['textarea', 'contenteditable'],
                                            'ismap ' => ['img'],
                                            'kind ' => ['track'],
                                            'label ' => ['optgroup', 'option', 'track'],
                                            'list ' => ['input'],
                                            'loop ' => ['audio', 'marquee', 'video'],
                                            'low ' => ['meter'],
                                            'max ' => ['input', 'meter', 'progress'],
                                            'maxlength ' => ['input', 'textarea'],
                                            'minlength ' => ['input', 'textarea'],
                                            'media ' => ['a', 'area', 'link', 'source', 'style'],
                                            'method ' => ['form'],
                                            'min ' => ['input', 'meter'],
                                            'multiple ' => ['input', 'select'],
                                            'muted ' => ['audio', 'video'],
                                            'name ' => ['button', 'form', 'fieldset', 'iframe', 'input', 'object', 'output', 'select', 'textarea', 'map', 'meta', 'param'],
                                            'novalidate ' => ['form'],
                                            'open ' => ['details', 'dialog'],
                                            'optimum ' => ['meter'],
                                            'pattern ' => ['input'],
                                            'ping ' => ['a', 'area'],
                                            'placeholder ' => ['input', 'textarea'],
                                            'playsinline ' => ['video'],
                                            'poster ' => ['video'],
                                            'preload ' => ['audio', 'video'],
                                            'readonly ' => ['input', 'textarea'],
                                            'referrerpolicy ' => ['a', 'area', 'iframe', 'img', 'link', 'script'],
                                            'rel ' => ['a', 'area', 'link'],
                                            'required ' => ['input', 'select', 'textarea'],
                                            'reversed ' => ['ol'],
                                            'rows ' => ['textarea'],
                                            'rowspan ' => ['td', 'th'],
                                            'sandbox ' => ['iframe'],
                                            'scope ' => ['th'],
                                            'selected ' => ['option'],
                                            'shape ' => ['a', 'area'],
                                            'size ' => ['input', 'select'],
                                            'sizes ' => ['link', 'img', 'source'],
                                            'span ' => ['col', 'colgroup'],
                                            'src ' => ['audio', 'embed', 'iframe', 'img', 'input', 'script', 'source', 'track', 'video'],
                                            'srcdoc ' => ['iframe'],
                                            'srclang ' => ['track'],
                                            'srcset ' => ['img', 'source'],
                                            'start ' => ['ol'],
                                            'step ' => ['input'],
                                            'target ' => ['a', 'area', 'base', 'form'],
                                            'type ' => ['button', 'input', 'embed', 'object', 'ol', 'script', 'source', 'style', 'menu', 'link'],
                                            'usemap ' => ['img', 'input', 'object'],
                                            'value ' => ['button', 'data', 'input', 'li', 'meter', 'option', 'progress', 'param'],
                                            'width ' => ['canvas', 'embed', 'iframe', 'img', 'input', 'object', 'video'],
                                            'wrap ' => ['textarea']

    ];

    public const GLOBAL_ATTRIBUTES = [
                                        'accesskey', 'autocapitalize', 'class', 'contenteditable', 'contextmenu', 'data-*', 'dir', 
                                        'draggable', 'hidden', 'id', 'itemprop', 'lang', 'role', 'slot', 'spellcheck', 'style', 
                                        'tabindex', 'title', 'translate'
    ];
}