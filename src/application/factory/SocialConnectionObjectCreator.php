<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 17:28
 */

namespace src\application\factory;


use src\application\validator\SocialConnectionConfigValidator;

class SocialConnectionObjectCreator implements ObjectCreator
{
    public function createObject($config) {
        $validator = new SocialConnectionConfigValidator();
        $validator->setObject($config);
        $validator->validate();
        $className = $config['class'];
        return new $className;
    }
}