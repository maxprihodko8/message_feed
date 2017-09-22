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
use src\feed\component\adapter\TwitterMessageAdapter;
use src\feed\component\adapter\TwitterValidator;
use src\feed\component\comparator\IdMessageComparator;

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
     * @param int $since_id
     * @return array messages
     * get messages from api of twitter, then adapt to application messages and returns message list
     */
    public function get($limit = 25, $since_id = 0)
    {
        $parameters = [
            'count' => $limit,
        ];
        if ($since_id !== 0) {
            $parameters['since_id'] = $since_id;
        }
        $messagesFromApi = $this->oauth->get('/statuses/user_timeline', $parameters);

        $validator = new TwitterValidator();
        $validator->validate($messagesFromApi);

        $messageAdapter = new TwitterMessageAdapter();
        $messages = $messageAdapter->adapt($messagesFromApi);

        usort($messages, new IdMessageComparator());
        return array_reverse($messages);

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