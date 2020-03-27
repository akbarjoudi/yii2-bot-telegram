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

   private $_document;

   private $_video;

   public $caption;

   private $_animation;

   private $_voice;

   private $_video_note;

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

    /**
     * 
     */
    public function getAudio()
    {
       return $this->_audio;
    }

    /**
     * 
     */
    public function setAudio($value)
    {
       $this->_audio = new Audio($value);
    }

    /**
     * 
     */
    public function getPhoto()
    {
       return $this->_photo;
    }

    /**
     * 
     */
    public function setPhoto($value)
    {
       $this->_photo = new Photo($value);
    }

    /**
     * 
     */
    public function getDocument()
    {
       return $this->_document;
    }

    /**
     * 
     */
    public function setDocument($value)
    {
       $this->_document = new \aki\telegram\types\Document($value);
    }

    /**
     * 
     */
    public function getVideo()
    {
       return $this->_video;
    }

    /**
     * 
     */
    public function setVideo($value)
    {
       $this->_video = new Video($value);
    }

    /**
     * 
     */
    public function getAnimation()
    {
       return $this->_animation;
    }

    /**
     * 
     */
    public function setAnimation($value)
    {
       $this->_animation = new Animation($value);
    }

    /**
     * 
     */
    public function getVoice()
    {
       return $this->_voice;
    }

    /**
     * 
     */
    public function setVoice($value)
    {
         $this->_voice = new Voice($value);
    }

    /**
     * 
     */
    public function getVideoNote()
    {
         return $this->_video_note;
    }

    /**
     * 
     */
    public function setVideoNote($value)
    {
         $this->_video_note = new VideoNote($value);
    }
}