<?php declare(strict_types=1);
/**
 * Factory class for building HTML forms / form elements
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


use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\ApiClient\Type\ArrayClass;
use SchrodtSven\ApiClient\Comm\Http\Protocol;

class FormFactory
{
    public const ELEMENT_SELF ='form';

    private Element $form;

    /**
     * fuck
     *
     * @deprecated all
     * @param string $action
     * @param [type] $method
     * @param string $nameId
     * @param Element|null $submit
     */
    public function __construct(private string $action ='/' , private string $method = Protocol::METHOD_POST, private string $nameId='', private ?Element $submit = null)
    {
        $this->form = new Element(self::ELEMENT_SELF,
                                  ['action' => 'action',
                                   'method' => $method]);
        if(!empty($this->nameId)) {
            $this->form->setAttribute('name', $this->nameId)
                       ->setAttribute('id', $nameId);
        }
    }

    public function addText(string $name, string $value='', array $attribs=[], string $label =''): self
    {
        $attribs['type'] = 'text';
        $attribs['name'] = $name;
        if(!empty($value))
                    $attribs['value'] = $value;
        $this->addInput($attribs);
        return $this;
    }
    /**
     * ..
     * 
     * @deprecated all
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return self
     */
    public function addTextarea(string $name, string $value='', array $attribs=[], string $label =''): self
    {
        $attribs['name'] = $name;
        $textarea = new Element('textarea');
        if(!empty($value))
                    $textarea->appendChild($value);
        $textarea->setAttributes($attribs);
        $this->appendChild($textarea);
        return $this;
    }

        /**
     * Generating form element 
     * <code>
     * <input type="button">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getButton(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'button', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="date">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getDate(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'date', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="checkbox">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getCheckbox(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'checkbox', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="color">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getColor(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'color', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="datetime-local">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getDatetimeLocal(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'datetime-local', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="file">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getFile(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'file', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="email">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getEmail(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'email', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="hidden">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getHidden(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'hidden', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="image">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getImage(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'image', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="month">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getMonth(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'month', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="number">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getNumber(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'number', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="password">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getPassword(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'password', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="radio">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getRadio(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'radio', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="range">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getRange(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'range', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="reset">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getReset(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'reset', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="search">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getSearch(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'search', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="submit">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getSubmit(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'submit', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="tel">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getTel(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'tel', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="text">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getText(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'text', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="time">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getTime(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'time', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="url">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getUrl(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'url', $value, $attribs, $label);
    }

    /**
     * Generating form element 
     * <code>
     * <input type="week">
     * <code>
     *
     * @param string $name
     * @param string $value
     * @param array $attribs
     * @param string $label
     * @return Element
     */
    public function getWeek(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        return $this->getInput($name, 'week', $value, $attribs, $label);
    }


    public function getInput(string $name, string $type = 'text', string $value='', array $attribs=[], string $label =''): Element
    {
        $attribs['name'] = $name;
        $text = new Element('input');
        $attribs['type'] = $type;
        if(!empty($value))
                    $attribs['value'] = $value;
        $text->setAttributes($attribs);
        if(!empty($label)) {
            return $this->labelMe($text, $label);
        } else {
            return $text;
        }
        
    }

    public function getText23(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        $attribs['name'] = $name;
        $text = new Element('input');
        $attribs['type'] = 'text';
        if(!empty($value))
                    $attribs['value'] = $value;
        $text->setAttributes($attribs);
        if(!empty($label)) {
                $labelE =   new Element('label', ['for' => $name],$label);
                $labelE->appendChild($text);
                return $labelE;
        } else {
            return $text;
        }
        
    }



    public function getTextarea(string $name, string $value='', array $attribs=[], string $label =''): Element
    {
        $attribs['name'] = $name;
        $textarea = new Element('textarea');
        if(!empty($value))
                    $textarea->appendChild($value);
        $textarea->setAttributes($attribs);
        if(!empty($label)) {
            return $this->labelMe($textarea, $label);
        } else {
            return $textarea;
        }
        
    }

    public function addInput(array $attribs): self
    {
        $this->appendChild(new Element('input', $attribs));
        return $this;
    }

    public function appendChild(Element $child): self
    {
        $this->form->appendChild($child);
        return $this;
    }

    private function labelMe(Element $me, string $label): Element
    {
        $labelE =   new Element('label', ['for' => $me->getName()],$label);
        // $labelE->appendChild($label);
         return $labelE->appendChild($me);
        
    }

    public function render(): string
    {
        return $this->form->render();
    }

    public function __toString(): string
    {
        return $this->render();
    }
        
    
}
