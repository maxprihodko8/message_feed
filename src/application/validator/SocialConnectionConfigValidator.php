<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 17:30
 */

namespace src\application\validator;

/**
 * Class SocialConnectionConfigValidator
 * @package src\application\validator
 * validator of connection config
 */
class SocialConnectionConfigValidator extends ConfigValidator
{
    protected $requiredFields = ['class'];

}