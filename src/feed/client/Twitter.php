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
use src\feed\component\message\TwitterMessage;

/**
 * Class Twitter
 * @package src\feed\client
 * implementation of source interface - twitter one
 */
class Twitter implements SourceInterface
{
    /**
     * @var $oauth TwitterOAuth connection and implementation with libraries
     */
    private $oauth;

    /**
     * @param int $limit
     * get last tweets with limit
     */
    public function get($limit = 25)
    {
        $messagesFromApi = $this->oauth->get('/statuses/user_timeline', [
            'count' => $limit,
        ]);
        $messages = [];
        foreach ($messagesFromApi as $twitterMessage) {
            $messages[] = new TwitterMessage([
                'id' => $twitterMessage->id ?? '',
                'text' => $twitterMessage->text ?? '',
                'date' => $twitterMessage->created_at,
            ]);
        }
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