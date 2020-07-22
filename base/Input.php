<?php
namespace aki\telegram\base;

use aki\telegram\types\CallbackQuery;
use aki\telegram\types\Message;

/**
 * 
 */
class Input extends Type
{
    public $update_id;

    private $_message;

    private $_callback_query;

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

    public function getCallback_query()
    {
        return $this->_callback_query;
    }

    public function setCallback_query($value)
    {
        $this->_callback_query = new CallbackQuery($value);
    }
}