<?php

namespace aki\telegram\base;

use aki\telegram\types\Result;

/**
 * 
 */
class Response extends Type
{
    /**
     * 
     */
    public $ok;

    /**
     * 
     */
    private $_result;

    public $error_code;

    public $description;

    public function getResult()
    {
        return $this->_result;
    }

    public function setResult($value)
    {
        // handle boolean response in case of deleteMessage
        if (!is_array($value) && !is_object($value)) {
            $this->_result = $value;
        } else {   
            $this->_result = new Result($value);
        }
    }
}
