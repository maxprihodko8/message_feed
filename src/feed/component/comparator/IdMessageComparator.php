<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 21.09.17
 * Time: 20:24
 */

namespace src\feed\component\comparator;


use src\feed\component\message\Message;

/**
 * Class IdMessageComparator
 * @package src\feed\component\comparator
 * id message comparator
 */
class IdMessageComparator implements MessageComparator
{

    public function __invoke(Message $message1, Message $message2)
    {
        return $message1->getId() <=> $message2->getId();
    }
}