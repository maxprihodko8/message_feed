<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 13:40
 */

namespace src\application\builder;

use src\application\helper\Replacer;
use src\application\validator\ConfigValidator;

class ApplicationBuilder implements ApplicationBuilderInterface
{
    private $application;

    public function build ($config)
    {
        if (empty($this->application)) {
            throw new \InvalidArgumentException('Application instance is not found here');
        }

        $validator = new ConfigValidator();
        $validator->setObject($config);
        $validator->validate();

    }

    public function setContainer ($config) {
        $containerBuilder = new ContainerBuilder();
        return $containerBuilder->build($config);
    }

    public function replaceParameters ($config, $parameters) {
        if (empty($parameters)) {
            return $config;
        }
        if (is_array($config)) {
            return json_decode(Replacer::multipleReplace(json_encode($config), $parameters), true);
        } else {
            return Replacer::multipleReplace($config, $parameters);
        }
    }

    /**
     * @return mixed
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param mixed $application
     */
    public function setApplication($application)
    {
        $this->application = $application;
    }
}