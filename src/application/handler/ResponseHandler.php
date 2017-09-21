<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 21.09.17
 * Time: 13:57
 */

namespace src\application\handler;


use src\application\component\Response;
use src\application\core\Application;

class ResponseHandler
{
    public function createResponse() {
        $response = new Response();
        Application::$container->response = $response;
    }

    public function setBody($body) {
        Application::$container->response->setBody($body);
    }

    public function setHeaders($header) {
        Application::$container->response->setHeader($header);
    }

    public function send() {
        echo Application::$container->response->getBody();
    }
}