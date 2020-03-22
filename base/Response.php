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
    
    public function getResult()
    {
        return $this->_result;
    }

    public function setResult($value)
    {
        $this->_result = new Result($value);
    }
}