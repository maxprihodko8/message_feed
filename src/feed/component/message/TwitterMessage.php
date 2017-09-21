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
    private $id;
    private $text;
    private $date;

    const attributes_list = [
        'id',
        'text',
        'date',
    ];

    public function __construct($attributes = null)
    {
        if (!empty($attributes)) {
            $this->setAttributes($attributes);
        }
    }

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


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setAttributes($attributes)
    {
        foreach ($attributes as $key => $value) {
            if (!empty(array_search($key, self::attributes_list))) {
                $this->{'set' . $key}($value);
            } else if ($key === 'id') {
                $this->setId($value);
            }

        }
    }

}