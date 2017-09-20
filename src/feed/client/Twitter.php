<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 20.09.17
 * Time: 18:34
 */
namespace src\feed\client;

use Abraham\TwitterOAuth\TwitterOAuth;
use src\application\social\SourceInterface;

class Twitter implements SourceInterface
{
    private $oauth;


    public function get($limit = 25)
    {
        //@TODO implement
    }

    /**
     * @return mixed
     */
    public function getOauth()
    {
        return $this->oauth;
    }

    /**
     * @param mixed $oauth
     */
    public function setOauth($oauth)
    {
        $this->oauth = $oauth;
    }

}