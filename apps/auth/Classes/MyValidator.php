<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 27/11/2015
 * Time: 12:58
 */

namespace auth\Classes;

class MyValidator
{
    private $value;

    /**
     * MyValidator constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function validate()
    {
        return ($this->value == "12345");
    }

    public function getValidationFailedMessage(){
        return sprintf("MyValidator failed for %s",$this->value);
    }
}