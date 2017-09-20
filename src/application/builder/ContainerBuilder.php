<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 15:05
 */

namespace src\application\builder;

use src\application\di\Container;
use src\application\factory\SocialConnectionObjectFactory;
use src\application\validator\SocialConnectionConfigValidator;

/**
 * Class ContainerBuilder
 * @package src\application\builder
 * implementation of builder Interface which create container and insert auth module in it
 */
class ContainerBuilder implements BuilderInterface
{

    /**
     * @param $config
     * @return Container
     * method related to creation of container
     */
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
                $socialObjectCreator = new SocialConnectionObjectFactory();

                $container->auth = $socialObjectCreator->createObject($auth);
            }
        }
        return $container;
    }
}