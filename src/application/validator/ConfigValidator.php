<?php
/**
 * Created by PhpStorm.
 * User: pn-user30
 * Date: 20.09.17
 * Time: 14:49
 */

namespace src\application\validator;

/**
 * Class ConfigValidator
 * @package src\application\validator
 * validator of config
 */
class ConfigValidator implements Validator
{
    protected $object;

    protected $requiredFields = ['feed_limit'];

    /**
     * validates config
     * @throws \InvalidArgumentException
     */
    public function validate(): void
    {
        if (empty($this->object)) {
            throw new \InvalidArgumentException('There is empty file config.php which is needed!');
        }
        if (!is_array($this->object)) {
            throw new \InvalidArgumentException(
                'Sorry, but you missed some of required fields from the list '.
                implode($this->requiredFields, ', ')
            );
        }

        $this->validateAttributes($this->object, $this->requiredFields);

    }

    /**
     * @param $object
     * @param $field
     *
     * @throws \InvalidArgumentException
     * validate attributes in required fields
     */
    private function validateAttributes($object, $field)
    {
        foreach ($this->requiredFields as $key => $field) {
            if (empty($this->object[$field])) {
                throw new \InvalidArgumentException('You missed field in config.php file - '.$field);
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