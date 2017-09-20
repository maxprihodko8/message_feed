<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 17:28
 */

namespace src\application\factory;


use src\application\validator\SocialConnectionConfigValidator;

/**
 * Class SocialConnectionObjectCreator
 * @package src\application\factory
 * concrete implementation of interface - creation of instance
 */
class SocialConnectionObjectCreator implements ObjectCreator
{
    /**
     * @param $config
     * @return mixed
     * validates config and creates object by class path
     */
    public function createObject($config) {
        $validator = new SocialConnectionConfigValidator();
        $validator->setObject($config);
        $validator->validate();
        $className = $config['class'];
        return new $className;
    }
}