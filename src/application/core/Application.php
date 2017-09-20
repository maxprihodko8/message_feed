<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 13:30
 */

namespace src\application\core;


use src\application\builder\ApplicationBuilder;

class Application implements ApplicationState
{
    private $container;

    private $status;

    private $state;

    public function __construct($config)
    {
        $builder = new ApplicationBuilder();
        $builder->build();
    }

    public function init() {
    }

    public function handleRequest () {

    }

    public function createResponse () {
    }

    public function sendResponse() {

    }
}