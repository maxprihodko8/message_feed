<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 15:05
 */

namespace src\application\builder;



use src\application\di\Container;

class ContainerBuilder implements BuilderInterface
{

    public function build($config)
    {
        $container = new Container();
    }
}