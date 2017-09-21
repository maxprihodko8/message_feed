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

/**
 * Class Twitter
 * @package src\feed\client
 * implementation of source interface - twitter one
 */
class Twitter implements SourceInterface
{
    /**
     * @var $oauth mixed connection and implementation with libraries
     */
    private $oauth;

    /**
     * @param int $limit
     * get last tweets with limit
     */
    public function get($limit = 25)
    {
    }

    /**
     * @return mixed
     * getter for oauth
     */
    public function getOauth()
    {
        return $this->oauth;
    }

    /**
     * @param mixed $oauth
     * setter for oauth
     */
    public function setOauth($oauth)
    {
        $this->oauth = $oauth;
    }

}