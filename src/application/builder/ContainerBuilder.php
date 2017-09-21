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

/**
 * Class ContainerBuilder
 * @package src\application\builder
 * implementation of builder Interface which create container and insert auth module in it
 */
class ContainerBuilder implements BuilderInterface
{
    private $container;

    public function __construct(Container $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param $config
     * @return Container
     * method related to creation of container
     */
    public function build($config)
    {
        if (empty($this->container)) {
            $this->container = new Container();
        }
        foreach ($config as $key => $value) {

            if ($key === 'auth') {
                $socialObjectCreator = new SocialConnectionObjectFactory();
                $this->container->auth = $socialObjectCreator->createObject($value);
            }
        }

        return $this->container;
    }
}