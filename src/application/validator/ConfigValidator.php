<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 14:49
 */

namespace src\application\validator;


class ConfigValidator implements Validator
{
    private $object;

    private $requiredFields = ['feed_limit'];

    public function validate()
    {
        if (!is_array($this->object)) {
            throw new \InvalidArgumentException('Sorry, but you missed some of required fields from the list ' .
            implode($this->requiredFields, ', '));
        }

        $this->validateAttributes($this->object, $this->requiredFields);

    }

    private function validateAttributes($object, $field) {
        foreach ($this->requiredFields as $key => $field) {
            if (empty($this->object[$field])) {
                throw new \InvalidArgumentException('You missed field in config.php file - ' . $field);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }


}