<?php
namespace Beejee\Decorators;

abstract class AbstractDecorator
{
    public static function create($className,$model)
    {
        $className = 'Beejee\\Decorators\\' . ucfirst($className) . 'Decorator';
        return new $className($model);

    }

    abstract public function title();
    abstract public function body();
}