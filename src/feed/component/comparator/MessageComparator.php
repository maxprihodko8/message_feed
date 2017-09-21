<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 21.09.17
 * Time: 17:46
 */

namespace src\feed\component\comparator;


use src\feed\component\message\Message;

/**
 * Interface MessageComparator
 * @package src\feed\component\comparator
 * message comparator
 */
interface MessageComparator
{
    public function __invoke(Message $message1, Message $message2);
}