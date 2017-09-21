<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 21.09.17
 * Time: 9:42
 */

namespace src\application\handler\initial;

/**
 * Class ContainerInitialHandler
 * @package src\application\handler\initial
 * reads config and chooses what to take from it and returns it as array
 */
class ContainerInitialHandler implements InitialHandlerConfigCreatorInterface
{
    /**
     * @param $initialConfig
     * @return array
     * adapts config for builder needs
     */
    public function getConfigAdaptedForBuilder($initialConfig)
    {
        $result_array = [];
        if (!empty($initialConfig['app']['use_auth'])) {
            $auth = $initialConfig['social']['credentials'][$initialConfig['app']['use_auth']];
            if (!empty($auth)) {

                $result_array['auth'] = $auth;
            }
        }
        return $result_array;
    }
}