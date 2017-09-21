<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 21.09.17
 * Time: 9:34
 */

namespace src\application\handler\initial;


interface InitialHandlerConfigCreatorInterface
{
    public function getConfigAdaptedForBuilder($initialConfig);
}