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
use src\feed\component\comparator\DateMessageComparator;
use src\feed\component\comparator\IdMessageComparator;
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
     * @param int $since
     * @return array
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
        $messages = [];
        foreach ($messagesFromApi as $twitterMessage) {
            $messages[] = new TwitterMessage([
                'id' => $twitterMessage->id ?? '',
                'text' => $twitterMessage->text ?? '',
                'date' => $twitterMessage->created_at,
            ]);
        }

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