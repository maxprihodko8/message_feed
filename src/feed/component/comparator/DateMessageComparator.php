<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 21.09.17
 * Time: 17:47
 */

namespace src\feed\component\comparator;


use src\feed\component\message\Message;

/**
 * Class DateMessageComparator
 * @package src\feed\component\comparator
 * data comparator
 */
class DateMessageComparator implements MessageComparator
{

    public function __invoke(Message $message1, Message $message2)
    {
        return $message1->getDate() <=> $message2->getDate();
    }
}