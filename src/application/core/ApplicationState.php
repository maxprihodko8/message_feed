<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 14:29
 */

namespace src\application\core;


interface ApplicationState
{
    const STATE_BEGIN = 1;
    const STATE_INIT = 2;
    const STATE_REQUEST_HANDLE = 3;
    const STATE_RESPONSE_HANDLE = 4;
    const STATE_END = 5;
}