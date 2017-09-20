<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 17:28
 */

namespace src\application\factory;

use src\application\social\SourceInterface;
use src\application\validator\SocialConnectionConfigValidator;

/**
 * Class SocialConnectionObjectFactory
 * @package src\application\factory
 * concrete implementation of interface - creation of instance
 */
class SocialConnectionObjectFactory implements ObjectFactory
{
    /**
     * @param $config
     * @return mixed validates config and creates object by class path
     * validates config and creates object by class path
     * @throws \Exception
     */
    public function createObject($config) {
        $this->validate($config);
        $className = $config['class'];

        $classObject = new $className;
        if (!($classObject instanceof SourceInterface)) {
            throw new \Exception('Class object ' . $className::className() . ' should be instance of ' . SourceInterface::class);
        }
        if (!empty($config['oauth'])){
            $secret = $config['secret'];
            $classObject->setOauth((new $config['oauth'](array_shift($secret), array_shift($secret), array_shift($secret), array_shift($secret))));
        }
        return $classObject;
    }

    private function validate($config) {
        $validator = new SocialConnectionConfigValidator();
        $validator->setObject($config);
        $validator->validate();
    }
}