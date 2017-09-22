<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 22.09.17
 * Time: 9:43
 */

namespace src\feed\component\adapter;


class TwitterValidator
{
    public function validate($twitterResponse) {
        if (!(is_array($twitterResponse))) {
            throw new \TypeError('Type of response is not instance of stdClass');
        }
        if (!empty($twitterResponse->errors)) {
            throw new \ErrorException('Errors are found in response ' . implode($twitterResponse->errors));
        }
    }
}
