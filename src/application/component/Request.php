<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 14:35
 */

namespace src\application\component;

/**
 * Class Request
 * @package src\application\component
 * class related to request
 */
class Request extends BaseComponent
{
    private $url;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}