<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 17:25
 */

namespace src\application\social;


interface SourceInterface
{
    public static function get ($limit = 25);
}