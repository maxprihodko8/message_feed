<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 13:30
 */

namespace src\application\core;

use Exception;
use Error;
use src\application\builder\ApplicationBuilder;
use src\application\handler\RequestHandler;
use src\application\handler\ResponseHandler;

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
        } catch (Exception | Error $exception) {
            $this->exceptionHandle($exception);
        }
    }


    /**
     * request handle function
     */
    public function handleRequest()
    {
        try {
            $requestHandler = new RequestHandler();
            $requestHandler->parseRequest();
            self::$container->requestHandler = $requestHandler;
            $this->state = self::STATE_REQUEST_HANDLE;
        } catch (Exception | Error $exception) {
            $this->exceptionHandle($exception);
        }
    }

    /**
     * creation of response
     * with simple control over it - if request with any letter after / - response will be another
     */
    public function createResponse()
    {
        try {
            $this->state = self::STATE_RESPONSE_CREATE;

            $responseHandler = new ResponseHandler();
            $responseHandler->createResponse();
            $url = Application::$container->request->getUrl();
            if (empty($url) || $url === '/') {
                $responseHandler->setBody(file_get_contents(__DIR__.'/../../../app/views/index.php'));
            } else if (preg_match('/\/messages\/since_id=\d{1,}/', $url)) {
                preg_match('/(?!since_id=)\d{1,}/', $url, $value);
                $responseHandler->setBody(['messages' => self::$container->auth->get(25, $value)]);
            } else if ($url === '/messages') {
                $responseHandler->setBody(['messages' => self::$container->auth->get(25)]);
            }
            else {
                $responseHandler->setBody(null);
            }
            self::$container->responseHandler = $responseHandler;

        } catch (Exception | Error $exception) {
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
            /** @var ResponseHandler $responseHandler */
            $responseHandler = self::$container->responseHandler;
            $responseHandler->send();
        } catch (Exception | Error $exception) {
            $this->exceptionHandle($exception);
        }
    }

    /**
     * @param Exception $exception | Error exception (not error, only exception)
     * Makes some good work showing message against just dieing and log
     */
    private function exceptionHandle($exception)
    {
        if (self::$container->responseHandler === null) {
            self::$container->responseHandler = new ResponseHandler();
        }
        self::$container->responseHandler->setBody(['errors' => "There is an Exception with message ".$exception->getMessage()]);
        $this->sendResponse();
        exit();
    }
}