<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 13:30
 */

namespace src\application\core;


use Exception;
use src\application\builder\ApplicationBuilder;

/**
 * Class Application
 * @package src\application\core
 * class is a core of all application - init, handle request, create response and send it
 */
class Application implements ApplicationState
{
    /**
     * @var \src\application\di\Container $container simple container for DI
     */
    public static $container;

    /**
     * @var int $state state of execution of application
     */
    protected $state;

    /**
     * Application constructor.
     * @param $config array configuration for application
     * @param array $parameters parameters which replace itself %name% values in config
     */
    public function __construct($config, $parameters = [])
    {
        /** @var Exception $exception it will be better to show normal error although sometimes is better to show trace */
        try {
            $this->state = self::STATE_INIT;
            $builder = new ApplicationBuilder();
            $builder->setApplication($this);
            /**
             * replace process of parameters
             */
            $config = $builder->replaceParameters($config, $parameters);

            /**
             * initial building of application - checking of configuration
             * then - creation of container with singletons
             */
            $builder->build($config['app']);
            self::$container = $builder->createContainer($config);
        } catch (Exception $exception) {
            $this->exceptionHandle($exception);
        }
    }


    /**
     * request handle function
     */
    public function handleRequest()
    {
        try {
            $this->state = self::STATE_REQUEST_HANDLE;
        } catch (Exception $exception) {
            $this->exceptionHandle($exception);
        }
    }

    /**
     * creation of response
     */
    public function createResponse()
    {
        try {
            $this->state = self::STATE_RESPONSE_CREATE;
        } catch (Exception $exception) {
            $this->exceptionHandle($exception);
        }
    }

    /**
     * this should be last point of application and then die die die
     */
    public function sendResponse()
    {
        try {
            $this->state = self::STATE_END;
        } catch (Exception $exception) {
            $this->exceptionHandle($exception);
        }
    }

    /**
     * @param Exception $exception exception (not error, only exception)
     * Makes some good work showing message against just dieing and log
     */
    private function exceptionHandle(Exception $exception) {
        echo "There is an Exception with message " . $exception->getMessage() . ' ' . $exception->getTrace();
        $this->sendResponse();
    }
}