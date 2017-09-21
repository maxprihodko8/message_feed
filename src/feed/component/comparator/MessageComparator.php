<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 21.09.17
 * Time: 17:46
 */

namespace src\feed\component\comparator;


interface MessageComparator
{
    public function compare($date1, $date2);
}