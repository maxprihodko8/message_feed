<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 20.09.17
 * Time: 19:44
 */

namespace src\feed\component\message;


interface Message
{

    public function text();

    public function date();

    public function likeCount();

}