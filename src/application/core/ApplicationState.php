<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 14:29
 */

namespace src\application\core;


/**
 * Interface ApplicationState
 * @package src\application\core
 * variable application states
 */
interface ApplicationState
{
    const STATE_INIT = 1;
    const STATE_REQUEST_HANDLE = 2;
    const STATE_RESPONSE_CREATE = 3;
    const STATE_END = 4;
}