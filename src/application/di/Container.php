<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 13:30
 */

namespace src\application\di;

/**
 * Class Container
 * @package src\application\di
 * small DI container
 */
class Container
{
    /**
     * @var array $instances instances - singletons
     */
    private $instances = [];
    /**
     * @var ParameterContainer $parameterContainer class related to parameters of application
     */
    private $parameterContainer;


    /**
     * Container constructor.
     */
    public function __construct()
    {
        $this->parameterContainer = new ParameterContainer();
    }

    /**
     * @param $name
     * @return mixed
     * @throws \InvalidArgumentException
     * returns instance from container and if not any - throws exception
     */
    public function __get($name)
    {
        if (!empty($this->instances[$name])) {
            return $this->instances[$name];
        }
        return null;
        //throw new \InvalidArgumentException('Instance ' . $name . ' is not found in container');
    }

    /**
     * @param $name
     * @param $value
     * set new instance at container
     */
    public function __set($name, $value)
    {
        $this->instances[$name] = $value;
    }

    /**
     * @param $name
     * @param $value
     * add parameter to container of parameters
     */
    public function setParameter($name, $value): void
    {
        $this->parameterContainer->set($name, $value);
    }

    /**
     * @param $name
     * gets value parameter list
     * @return mixed
     */
    public function getParameter($name)
    {
        return $this->parameterContainer->get($name);
    }
}