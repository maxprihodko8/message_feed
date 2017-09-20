<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 15:05
 */

namespace src\application\builder;

use src\application\di\Container;
use src\application\factory\SocialConnectionObjectCreator;
use src\application\validator\SocialConnectionConfigValidator;

class ContainerBuilder implements BuilderInterface
{

    public function build($config)
    {
        $container = new Container();
        if (!empty($config['feed_limit'])) {
            $container->setParameter('feed_limit', $config['feed_limit']);
        }
        if (!empty($config['app']['use_auth'])) {
            $authName = $config['app']['use_auth'];
            $auth = $config['social']['credentials'][$config['app']['use_auth']];
            if (!empty($auth)) {
                $socialObjectCreator = new SocialConnectionObjectCreator();
                $container->auth = $socialObjectCreator->createObject($auth);


            }

        }
        return $container;
    }
}