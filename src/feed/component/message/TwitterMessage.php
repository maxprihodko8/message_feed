<?php
/**
 * Created by PhpStorm.
 * User: maxprihodko8
 * Date: 20.09.17
 * Time: 19:53
 */

namespace src\feed\component\message;


class TwitterMessage implements Message
{
    private $text;
    private $date;
    private $likes;

    const attributes_list = [
        'text',
        'date',
        'likes',
    ];


    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    public function getLikes()
    {
        return $this->likes;
    }


    public function setAttributes($attributes)
    {
        foreach ($attributes as $key => $value) {
            if (!empty(self::attributes_list[$key])) {
                $this->{'set' . $key}($value);
            }
        }
    }



}