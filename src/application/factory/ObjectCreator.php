<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 17:37
 */

namespace src\application\factory;


interface ObjectCreator
{
    public function createObject($config);

}