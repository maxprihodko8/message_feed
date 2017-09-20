<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 16:26
 */

namespace src\application\di;


class ParameterContainer
{
    private $parameters = [];

    public function set($name, $value)
    {
        $this->parameters[$name] = $value;
    }

    public function get($name) : mixed
    {
        return !empty($this->parameters[$name]) ? $this->parameters[$name] : false;
    }

}