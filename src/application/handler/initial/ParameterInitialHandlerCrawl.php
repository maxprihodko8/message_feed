<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 21.09.17
 * Time: 9:33
 */

namespace src\application\handler\initial;


class ParameterInitialHandlerCrawl implements InitialHandlerConfigCreatorInterface
{
    /**
     * @param $initialConfig
     * @return array
     * adapts some parameters of config as global parameters in container
     */
    public function getConfigAdaptedForBuilder($initialConfig)
    {
        if (!empty($initialConfig['feed_limit'])) {
            return ['feed_limit' => $initialConfig['feed_limit']];
        }
    }
}