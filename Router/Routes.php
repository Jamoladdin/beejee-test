<?php
namespace Beejee\Router;

use Beejee\Controllers\TasksController;

class Routes
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function parse()
    {
        $controllerName = $this->path[1];

        if(isset($this->path[2]))
        {
            $methodName = $this->path[2];
        }

        if(!empty($controllerName))
        {
            $className =  'Beejee\\Controllers\\' . ucfirst($controllerName) . 'Controller';
            $controller = new $className($controllerName);
        }
        else
        {
            $controller = new TasksController('Tasks');
        }
        if(!empty($methodName))
        {
            $controller->$methodName();
        }
        echo $controller->render();
    }
}