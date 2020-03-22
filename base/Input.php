<?php
namespace aki\telegram\base;

use aki\telegram\types\Message;

/**
 * 
 */
class Input extends Type
{
    public $update_id;

    private $_message;

    public function init()
    {
        parent::init();

        // ... initialization after configuration is applied
    }

    public function getMessage()
    {
        return $this->_message;
    }

    public function setMessage($value)
    {
        $this->_message = new Message($value);
    }
}