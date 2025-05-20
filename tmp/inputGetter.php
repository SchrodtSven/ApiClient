<?php



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
    public function getDatetime-local(string $name, string $value='', array $attribs=[], string $label =''): Element
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
