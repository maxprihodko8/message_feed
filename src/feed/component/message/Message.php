<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 20.09.17
 * Time: 19:44
 */

namespace src\feed\component\message;

/**
 * Interface Message
 * @package src\feed\component\message
 * POPO message object
 */
interface Message extends \JsonSerializable
{
    public function __construct($attributes);

    public function getId();
    public function setId($id);

    public function setText($text);
    public function getText();

    public function setDate($date);
    public function getDate();

    public function setAttributes($attributes);
}