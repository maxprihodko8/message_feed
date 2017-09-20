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

    private $state;

    public function __construct($config, $parameters = [])
    {
        $this->state = self::STATE_INIT;
        $builder = new ApplicationBuilder();
        $builder->setApplication($this);
        $config = $builder->replaceParameters($config, $parameters);


        $builder->build($config['app']);
        $builder->setContainer($config['app']);
    }


    public function handleRequest () {
        $this->state = self::STATE_REQUEST_HANDLE;
    }

    public function createResponse () {
        $this->state = self::STATE_RESPONSE_CREATE;
    }

    public function sendResponse() {
        $this->state = self::STATE_END;
    }
}