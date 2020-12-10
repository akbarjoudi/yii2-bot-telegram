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
        //for was set webhook
        // if (is_bool($value)) {
        //     $this->_result = $value;
        // } else {
            
        //     $this->_result = new Result($value);
        // }
        $this->_result = new Result($value);
    }
}
