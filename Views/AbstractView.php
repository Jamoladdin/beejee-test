<?php
namespace Beejee\Views;

abstract class AbstractView
{
    abstract public function render();


    public static function create($class, $decorator)
    {
        $class =  'Beejee\\Views\\' . ucfirst($class).'View';
        return new $class($decorator);
    }
}