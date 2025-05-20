<?php declare(strict_types=1);
/**
 * Class representing HTML element(s)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-18
 * 
 * @FIXME - refactor using ApiClient\Type\*
 */

namespace SchrodtSven\ApiClient\Frontend\Html;

use \DOMElement;
use \DOMDocument;
use \DOMException;
use \DomNode;
use \DOMText;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\ApiClient\Type\ArrayClass;

class Element
{

    /**
     * Flag, for HTML source formating
     * @var boolean
     */
    protected bool $beautify = true;

    /**
     * Name of current element (! name attribute) e.g: h1,input, textarea
     *
     * @var string
     */
    protected string $name = '';

    /**
     * Array holding class name(s) for current element
     *
     * @var array
     */
    protected array $class = [];

    /**
     * Array holding class name(s) for current element
     *
     * @var array
     */
    protected array $attributes = [];

    /**
     * Optional name of current element's ID
     *
     * @var string
     */
    protected string $id = '';

    /**
     * Internally used instance of
     *
     * @var DOMDocument
     */
    protected DOMDocument $document;

    /**
     * Internally used instance of
     *
     * @var DOMElement
     */
    protected DOMElement $element;

    /**
     * Constructor function
     *
     * @param string $name
     * @param mixed $content
     * @param array $attribs
     * @throws DOMException
     */
    public function __construct(string $name, array $attribs = [], mixed $content = "")
    {

        $this->name = $name;
        // We just do that, because DOM*-API forces us to so - otherwise DOMNode
        // instances would be read only
        $this->document = new DOMDocument();
        $this->element =  $this->document->createElement($name);
        $this->document->appendChild($this->element);
        $this->document->formatOutput = true;
        // Setting up given attributes
        $this->setAttributes($attribs);
        if(!empty($content)) 
                $this->appendChild($this->ensureDomNode($content));
    }

    /**
     * Static factory method building instances of self
     *
     * @param string $name
     * @param array $attribs
     * @param mixed $content
     * @return self
     */
    public static function factory(string $name, array $attribs = [], mixed $content = ""): self
    {
        return new self($name, $attribs, $content);
    }

    /**
     * Returning string representation of Element
     * (internally using: DomNode)
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Element
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return DOMDocument
     */
    public function getDocument(): DOMDocument
    {
        return $this->document;
    }

    /**
     * @param DOMDocument $document
     * @return Element
     */
    public function setDocument(DOMDocument $document): self
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return DOMElement
     */
    public function getElement(): DOMElement
    {
        return $this->element;
    }

    /**
     * @param DOMElement $element
     * @return Element
     */
    public function setElement(DOMElement $element): self
    {
        $this->element = $element;
        return $this;
    }

    public function getAttribute(string $name)
    {
        return $this->attributes[$name] ?? null;
    }

    /**
     * Setting value for attribute
     *
     * @param string $name
     * @param string $value
     * @return Element
     */
    public function setAttribute(string $name, string $value): self
    {
        $this->attributes[$name] = $value;
        $this->element->setAttribute($name, $value);
        return $this;
    }

    /**
     * Setting attributes
     *
     * @param array $attribs
     * @return Element
     */
    public function setAttributes(array $attribs): self
    {

        // if we do have attributes, we will give them to the current element
        foreach ($attribs as $name => $value) {
            $this->element->setAttribute($name, $value);
            switch (mb_strtolower($name)) {
                case 'class':
                    $this->addClass($value);
                    break;
                case 'id':
                    $this->setId($value);
                    break;
            }
        }
        return $this;
    }

    /**
     * Ensuring, that given content will be converted to an instance of DomNode (or children)
     *
     * @param mixed $content
     * @return DOMNode
     */
    protected function ensureDomNode($content): DOMNode | string
    {
        return  match (true) {
            $content instanceof Element => $content->toDomElement(),
            $content instanceof DOMNode => $content,
            is_string($content) && empty($content) => '',
            is_string($content) => new DOMText($content),
            default => new DOMNode(),
        };
    }

    /**
     * Appending child node to current element
     *
     * @param mixed $node
     *v
     */
    public function appendChild(mixed $node): self
    {
        $node = $this->ensureDomNode($node);
        $node = $this->document->importNode($node, true);
        $this->element->appendChild($node);
        return $this;
    }

    /**
     * Appending list of child nodes to current element
     *
     * @param array $nodeList
     * @return Element
     */
    public function appendChildren(array $nodeList): self
    {
        foreach ($nodeList as $node) {
            $this->appendChild($node);
        }
        return $this;
    }

    /**
     * Addig class to element
     *
     * @param string $name
     * @return Element
     */
    public function addClass(string $name): self
    {
        if (in_array($name, $this->class)) {
            return $this;
        } else {
            $this->class[] = $name;
            // Setting new attribute value for class to internal \DOMElement
            $this->setAttribute('class', implode(' ', $this->class));
        }
        return $this;
    }

    /**
     * Removing class from  element
     *
     * @param string $name
     * @return Element
     */
    public function removeClass(string $name): self
    {
        if (($name = array_search($name, $this->class)) !== false) {
            unset($this->class[$name]);
            // Setting new attribute value for class to internal \DOMElement
            $this->setAttribute('class', implode(' ', $this->class));
        }
        return $this;
    }

    /**
     * Returning array with class name(s) for current element
     *
     * @return array
     */
    public function getClass(): array
    {
        return $this->class;
    }


    /**
     * Setting (new) value for ID attribute of current element
     *
     * @param string $name
     * @return Element
     */
    public function setId(string $name): self
    {
        $this->id = $name;
        // Setting new attribute value for id to internal \DOMElement
        $this->setAttribute('id', $name);
        return $this;
    }

    /**
     * Getting attribute value for ID of current element
     *
     * @return string
     */
    public function getId(): string | null
    {
        return $this->id ?? null;
    }

    /**
     * Returning (internally used) instance of
     *
     * @return DOMElement
     */
    public function toDomElement(): DOMElement
    {
        return $this->element;
    }

    public function render()
    {
        // Canonicalize nodes to a string @see https://www.php.net/manual/en/domnode.c14n.php
        return $this->sanitizeOutput($this->element->C14N());
        //return $this->element->saveXML();

    }

    protected function sanitizeOutput(string $xml): string
    {
        $find = [
            '></input>'

        ];
        $repl = [
            '/>'
        ];
        return str_replace($find, $repl, $xml);
    }

    
}
