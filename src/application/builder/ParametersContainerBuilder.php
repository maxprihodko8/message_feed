<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 21.09.17
 * Time: 9:27
 */

namespace src\application\builder;


use src\application\di\Container;

class ParametersContainerBuilder implements BuilderInterface
{
    private $container;

    public function __construct(Container $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param $config
     * @return mixed
     * has method build that makes some initial logic
     */
    public function build($config)
    {
        if (empty($this->container)) {
            $this->container = new Container();
        }
        foreach ($config as $key => $value) {
            $this->container->setParameter($key, $value);
        }
    }
}