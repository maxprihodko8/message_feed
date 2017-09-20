<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 13:40
 */

namespace src\application\builder;

use src\application\core\Application;
use src\application\helper\Replacer;
use src\application\validator\ConfigValidator;

/**
 * Class ApplicationBuilder
 * @package src\application\builder
 * class manages initial configuration and provide help to application
 */
class ApplicationBuilder implements ApplicationBuilderInterface
{
    /**
     * @var Application $application instance off main application
     */
    private $application;

    /**
     * @param $config array
     * function account for initial build of application - config check + check whether or not application instance is here
     */
    public function build ($config)
    {
        if (empty($this->application)) {
            throw new \InvalidArgumentException('Application instance is not found here');
        }

        /**
         * validation process
         */
        $validator = new ConfigValidator();
        $validator->setObject($config);
        $validator->validate();

    }

    /**
     * @param $config array configuration of application
     * @return \src\application\di\Container
     * creates builder for container and gives it configuration to begin with
     */
    public function createContainer ($config) {
        $containerBuilder = new ContainerBuilder();
        return $containerBuilder->build($config);
    }

    /**
     * @param $config array | string
     * @param $parameters array
     * @return mixed
     * replaces config parameters with file which does not holds in git
     */
    public function replaceParameters ($config, $parameters) {
        if (empty($parameters)) {
            throw new \Exception('There is no parameters.php file!');
        }
        if (is_array($config)) {
            return json_decode(Replacer::multipleReplace(json_encode($config), $parameters), true);
        } else {
            return Replacer::multipleReplace($config, $parameters);
        }
    }

    /**
     * @return mixed
     * get application instance
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param mixed $application
     * set application instance
     */
    public function setApplication($application)
    {
        $this->application = $application;
    }
}