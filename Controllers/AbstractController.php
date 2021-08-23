<?php
namespace Beejee\Controllers;


abstract class AbstractController
{
    public $model;
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
        $modelClass = 'Beejee\\Models\\'.$name.'Model';
        $this->model = new $modelClass;
    }

    public function render()
    {
        $decorator = \Beejee\Decorators\AbstractDecorator::create($this->name, $this->model);
        $view = \Beejee\Views\AbstractView::create($this->name, $decorator);
        return $view->render();
    }
}