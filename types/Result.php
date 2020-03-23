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

   private $_audio;

   private $_photo;

   public $caption;

   public $error_code;

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

    public function getAudio()
    {
       return $this->_audio;
    }

    public function setAudio($value)
    {
       $this->_audio = new Audio($value);
    }

    public function getPhoto()
    {
       return $this->_photo;
    }

    public function setPhoto($value)
    {
       $this->_photo = new Photo($value);
    }
}