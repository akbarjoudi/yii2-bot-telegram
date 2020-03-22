<?php
namespace aki\telegram\types;

use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * 
 */
class Result extends Type
{
   public $message_id;

   private $_from;

   private $_chat;

   public $date;

   public $text;


   /**
    * 
    */
   public function getFrom()
   {
      return $this->_from;
   }

   /**
    * 
    */
   public function setFrom($value)
   {
      $this->_from = new From($value);
   }

   /**
    * 
    */
    public function getChat()
    {
       return $this->_chat;
    }
 
    /**
     * 
     */
    public function setChat($value)
    {
       $this->_chat = new Chat($value);
    }
}