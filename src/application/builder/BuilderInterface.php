<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 13:41
 */

namespace src\application\builder;

/**
 * Interface BuilderInterface
 * @package src\application\builder
 * interface related to creation and initialization of app
 */
interface BuilderInterface
{
    /**
     * @param $config
     * @return mixed
     * has method build that makes some initial logic
     */
    public function build($config);
}