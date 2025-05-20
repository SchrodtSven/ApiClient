<?php declare(strict_types=1);
/**
 *  Minimalistic parser for templates in alternative PHP syntax (´PHTML´)
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/ApiClient
 * @package ApiClient
 * @version 0.1
 * @since 2025-01-15
 */

namespace SchrodtSven\ApiClient\App\Frontend;
use SchrodtSven\ApiClient\Type\StringClass;
use SchrodtSven\ApiClient\Type\ArrayClass;

class PhtmlParser
{
    
    private string $tplDir = 'src/lib/ApiClient/App/Tpl/';

    private string $viewDir = 'src/lib/ApiClient/App/Views/';

    private string $tpl = 'Document.generic';

    private string $view = '';

    private string $tplSuffix = '.phtml';

    public function __construct(private ?ArrayClass $content = null)
    {
        if(is_null($this->content)) 
            $this->content = new ArrayClass();
    }

    public function set(string $name, mixed $value): self
    {
        $this->content[$name] = $value;
        return $this;
    }

    public function get(string $name): string
    {
        return $this->content[$name] ?? '';
    }

    public function __get(string $name): mixed
    {
        return $this->get($name);
    }

    public function __set(string $name, mixed $value): void
    {
        $this->set($name, $value);
    }


     
    public function render(): string
    {
       return $this->renderInternal($this->tplDir . $this->tpl);
    }

    public function renderView(string $viewName): string
    {
        return $this->renderInternal($this->viewDir . $viewName );
    }
        
    public function renderDoclet(string $fileName): string
    {
        $tmp = (new self())->setTpl($fileName);
        return $tmp->render();
    }

    /**
     * Internally used rendering function using PHP's output control mechanism
     *
     * 
     * @see https://www.php.net/manual/en/ref.outcontrol.php
     * @param string $fullPath
     * @return string
     */
    private function renderInternal(string $fullPath): string
    {
        ob_start();
        require $fullPath . $this->tplSuffix;
        $view = ob_get_contents();
        ob_end_clean();
        return $view;
    }
    /**
     * Get the value of tpl
     *
     * @return string
     */
    public function getTpl(): string
    {
        return $this->tpl;
    }

    /**
     * Set the value of tpl
     *
     * @param string $tpl
     *
     * @return self
     */
    public function setTpl(string $tpl): self
    {
        $this->tpl = $tpl;
        return $this;
    }

    /**
     * Get the value of view
     *
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }

    /**
     * Set the value of view
     *
     * @param string $view
     *
     * @return self
     */
    public function setView(string $view): self
    {
        $this->view = $view;
        return $this;
    }
}