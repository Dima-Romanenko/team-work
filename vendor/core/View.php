<?php

class View
{
    public $template;

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function render($page,array $data = [])
    {
        var_dump($this->template);
        extract($data);
        include_once 'vendor'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$this->template.'.php';
    }
}