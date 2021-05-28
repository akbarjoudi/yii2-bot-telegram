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

   public $sender_chat;

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

   private $_forward_from;

   public $forward_date;

   private $_entities;

   private $_sticker;

   private $_reply_markup;
   
   public $caption_entities;

   private $_user;
   
   public $author_signature;
   
   /**
    * 
    */
    public function getUser()
    {
       return $this->_user;
    }
 
    /**
     * 
     */
    public function setUser($value)
    {
       $this->_user = new User($value);
    }

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

    /**
     * 
     */
    public function getForward_from()
    {
         return $this->_forward_from;
    }

    /**
     * 
     */
    public function setForward_from($value)
    {
         $this->_forward_from = new ForwardFrom($value);
    }


    /**
     * 
     */
    public function getEntities()
    {
         return $this->_entities;
    }

    /**
     * 
     */
    public function setEntities($value)
    {
         $this->_entities = new Entities($value);
    }


    /**
     * 
     */
    public function getSticker()
    {
         return $this->_sticker;
    }

    /**
     * 
     */
    public function setSticker($value)
    {
         $this->_sticker = new Sticker($value);
    }

    /**
     * 
     */
    public function getReply_markup()
    {
         return $this->_reply_markup;
    }

    /**
     * 
     */
    public function setReply_markup($value)
    {
         $this->_reply_markup = new InlineKeyboardMarkup($value);
    }
}
