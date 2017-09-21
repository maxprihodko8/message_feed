<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 21.09.17
 * Time: 22:11
 */

namespace src\feed\component\adapter;


use src\feed\component\message\TwitterMessage;

/**
 * Class TwitterMessageAdapter
 * @package src\feed\component\adapter
 * class related to adaptation of messages from twitter api to messages of application
 */
class TwitterMessageAdapter
{
    public function adapt($messagesFromApi) {
        $messages = [];
        foreach ($messagesFromApi as $twitterMessage) {
            if (!empty($twitterMessage->id) && !empty($twitterMessage->text) && !empty($twitterMessage->created_at))
                $messages[] = new TwitterMessage([
                    'id' => $twitterMessage->id,
                    'text' => $twitterMessage->text,
                    'date' => $twitterMessage->created_at,
                ]);
        }
        return $messages;
    }
}