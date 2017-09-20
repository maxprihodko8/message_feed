<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 15:45
 */

namespace src\application\helper;


use Exception;

/**
 * Class Replacer
 * @package src\application\helper
 * useful service related to replacing values in string
 */
class Replacer
{
    public static function replaceWith($string, $from, $to) {
        try {
            return str_replace($from, $to, $string);
        } catch (Exception $exception) {}
        return $string;
    }

    public static function multipleReplace($string, array $params) {
        foreach ($params as $key => $value) {
            $string = self::replaceWith($string, $key, $value);
        }
        return $string;
    }
}