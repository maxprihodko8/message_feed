<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 14:50
 */

namespace src\application\validator;


/**
 * Interface Validator
 * @package src\application\validator
 * validator interface
 */
interface Validator
{
    /**
     * @return mixed
     * validates an object
     */
    public function validate();
}