<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 13:30
 */

namespace src\application\di;

class Container
{
    private $instances = [];
    public $parameterContainer;

    public function __construct()
    {
        $this->parameterContainer = new ParameterContainer();
    }

    public function __get($name)
    {
        if (!empty($this->instances[$name])) {
            return $this->instances[$name];
        }
        throw new \InvalidArgumentException('Instance ' . $name . ' is not found in container');
    }

    public function __set($name, $value)
    {
        $this->instances[$name] = $value;
    }

    public function setParameter($name, $value)
    {
        $this->parameterContainer->set($name, $value);
    }

    public function getParameter($name)
    {
        $this->parameterContainer->get($name);
    }
}