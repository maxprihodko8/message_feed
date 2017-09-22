<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 16:26
 */

namespace src\application\di;


/**
 * Class ParameterContainer
 * @package src\application\di
 * additional class to container class - gives ability to add new parameters to application (sharable array list)
 */
class ParameterContainer
{
    /**
     * @var array $parameters
     * list of parameters
     */
    private $parameters = [];

    /**
     * @param $name
     * @param $value
     * set new parameter at list or replace old
     */
    public function set($name, $value): void
    {
        $this->parameters[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     * find parameter from list and if none is returns false
     */
    public function get($name)
    {
        return !empty($this->parameters[$name]) ? $this->parameters[$name] : false;
    }

}