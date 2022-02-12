<?php /** @noinspection PhpUnused */

namespace aki\telegram\base;

use aki\telegram\types\CallbackQuery;
use aki\telegram\types\Chat;
use aki\telegram\types\From;
use aki\telegram\types\Message;

class Input extends Type
{
    public $update_id;

    private $_message;

    private $_edited_message;

    private $_callback_query;

    private $_from;

    private $_chat;

    public $my_chat_member;

    public function getMessage()
    {
        return $this->_message;
    }

    public function setMessage($value): void
    {
        $this->_message = new Message($value);
    }
    
    public function getEdited_message()
    {
	    return $this->_edited_message;
    }

    public function setEdited_message($value): void
    {
	    $this->_edited_message = $value;
    }

    public function getCallback_query()
    {
        return $this->_callback_query;
    }

    public function setCallback_query($value): void
    {
        $this->_callback_query = new CallbackQuery($value);
    }


    public function getFrom()
    {
        return $this->_from;
    }

    public function setFrom($value): void
    {
        $this->_from = new From($value);
    }

    public function getChat()
    {
        return $this->_chat;
    }

    public function setChat($value): void
    {
        $this->_chat = new Chat($value);
    }
}
