<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 22.09.17
 * Time: 10:13
 */

namespace src\feed\client;


use src\application\core\Application;

class TwitterClient extends Twitter
{
    public function get($limit = 25) {
        $since_id = Application::$container->getParameter('since_id');
        if ($since_id !== false) {
            $this->parameters['since_id'] = $since_id;
        }
        return parent::get($limit);
    }
}