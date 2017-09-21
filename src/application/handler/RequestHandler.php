<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 14:33
 */

namespace src\application\handler;

use src\application\component\Request;
use src\application\core\Application;

/**
 * Class RequestHandler
 * @package src\application\request
 * handler of request
 */
class RequestHandler
{

    public function parseRequest() {
        if (Application::$container->request === null) {
            Application::$container->request = new Request();
        }
        Application::$container->request->setUrl($_SERVER['REQUEST_URI']);
    }

}