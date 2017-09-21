<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 17:25
 */

namespace src\application\social;


/**
 * Interface SourceInterface
 * @package src\application\social
 * source interface to implement in user models
 */
interface SourceInterface
{

    public function get ($limit = 25, $since_id = 0);
}