<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 17:37
 */

namespace src\application\factory;

/**
 * Interface ObjectCreator
 * @package src\application\factory
 * interface showing some object creator
 */
interface ObjectCreator
{
    /**
     * @param $config
     * @return mixed
     * creates an object
     */
    public function createObject($config);

}