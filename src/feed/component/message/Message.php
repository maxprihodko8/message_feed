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

    public function setText($text);
    public function getText();

    public function setDate($date);
    public function getDate();

    public function setLikes($likes);
    public function getLikes();

    public function setAttributes($attributes);
}