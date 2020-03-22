<?php
namespace aki\telegram\types;


use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents a message.
 */
class Message extends Type
{
    /**
     * Unique message identifier inside this chat
     * @var Integer
     */
    public $message_id;

    /**
     * Optional. Sender, empty for messages sent to channels
     * @var aki\telegram\types\User
     */
    private $_from;

    /**
     * 	Conversation the message belongs to
     * @var aki\telegram\types\Chat
     */
    private $_chat;

    /**
     * Date the message was sent in Unix time
     * @var Integer
     */
    public $date;

    /**
     * Optional. For forwarded messages, sender of the original message
     * @var aki\telegram\types\User
     */
    public $forward_from;

    /**
     * 	Optional. For messages forwarded from channels, information about the original channel
     * @var aki\telegram\types\Chat
     */
    public $forward_from_chat;

    /**
     * 	Optional. For messages forwarded from channels, identifier of the original message in the channel
     * @var Integer
     */
    public $forward_from_message_id;

    /**
     * 	Optional. For messages forwarded from channels, signature of the post author if present
     * @var String
     */
    public $forward_signature;

    /**
     * 	Optional. Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded messages
     * @var String
     */
    public $forward_sender_name;

    /**
     * Optional. For forwarded messages, date the original message was sent in Unix time
     * @var Integer
     */
    public $forward_date;

    /**
     * 	Optional. For replies, the original message.
     *  Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     * @var aki\telegram\types\Message
     */
    public $reply_to_message;

    /**
     * Optional. Date the message was last edited in Unix time
     * @var Integer
     */
    public $edit_date;

    /**
     * Optional. The unique identifier of a media message group this message belongs to
     * @var String
     */
    public $media_group_id;

    /**
     * 	Optional. Signature of the post author for messages in channels
     * @var String
     */
    public $author_signature;

    /**
     * 	Optional. For text messages, the actual UTF-8 text of the message, 0-4096 characters
     * @var String
     */
    public $text;

    /**
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     * 	@var Array of aki\telegram\types\MessageEntity
     */
    public $entities;
    
    /**
     * Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
     * @var Array of aki\telegram\types\MessageEntity
     */
    public $caption_entities;

    /**
     * Optional. Message is an audio file, information about the file
     * @var aki\telegram\types\Audio
     */
    public $audio;

    /**
     * Optional. Message is a general file, information about the file
     * @var aki\telegram\types\Document
     */
    public $document;

    /**
     * 	Optional. Message is an animation,
     *  information about the animation.
     *  For backward compatibility, when this field is set, the document field will also be set
     * @var aki\telegram\types\Animation
     */
    public $animation;

    /**
     * 	Optional. Message is a game, information about the game.
     * @var aki\telegram\types\Game
     */
    public $game;

    /**
     * Optional. Message is a photo, available sizes of the photo
     * @var Array of aki\telegram\types\PhotoSize
     */
    public $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     * @var aki\telegram\types\Sticker
     */
    public $sticker;

    /**
     * Optional. Message is a video, information about the video
     * @var aki\telegram\types\Video
     */
    public $video;

    /**
     * Optional. Message is a voice message, information about the file
     * @var aki\telegram\types\Voice
     */
    public $voice;

    /**
     * 	Optional. Message is a video note, information about the video message
     * @var aki\telegram\types\VideoNote
     */
    public $video_note;

    /**
     * 	Optional. Caption for the animation, audio, document, photo, video or voice, 0-1024 characters
     * @var String
     */
    public $caption;

    /**
     * 	Optional. Message is a shared contact, information about the contact
     * @var aki\telegram\types\Contact
     */
    public $contact;

    /**
     * 	Optional. Message is a shared location, information about the location
     * @var aki\telegram\types\Location
     */
    public $location;

    /**
     * Optional. Message is a venue, information about the venue
     * @var aki\telegram\types\Venue
     */
    public $venue;

    /**
     * Optional. Message is a native poll, information about the poll
     * @var aki\telegram\types\Poll
     */
    public $poll;

    /**
     * 	Optional. New members that were added to the group or supergroup and information about them
     *  (the bot itself may be one of these members)
     * @var Array of aki\telegram\types\User
     */
    public $new_chat_members;

    /**
     * Optional. A member was removed from the group, 
     * information about them (this member may be the bot itself)
     * @var aki\telegram\types\User
     */
    public $left_chat_member;

    /**
     * Optional. A chat title was changed to this value
     * @var String
     */
    public $new_chat_title;

    /**
     * Optional. A chat photo was change to this value
     * @var Array of aki\telegram\types\PhotoSize
     */
    public $new_chat_photo;

    /**
     * Optional. Service message: the chat photo was deleted
     * @var True
     */
    public $delete_chat_photo;

    /**
     * Optional. Service message: the group has been created
     * @var True
     */
    public $group_chat_created;

    /**
     * 	Optional. Service message: the supergroup has been created.
     *  This field can‘t be received in a message coming through updates,
     *  because bot can’t be a member of a supergroup when it is created.
     *  It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
     * @var True
     */
    public $supergroup_chat_created;

    /**
     *  Optional. Service message: the channel has been created.
     *  This field can‘t be received in a message coming through updates,
     *  because bot can’t be a member of a channel when it is created.
     *  It can only be found in reply_to_message if someone replies to a very first message in a channel.
     * @var True
     */
    public $channel_chat_created;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier. 
     * This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it.
     *  But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     * @var Integer
     */
    public $migrate_to_chat_id;


    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier.
     *  This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it.
     *  But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     * @var Integer
     */
    public $migrate_from_chat_id;

    /**
     * 	Optional. Specified message was pinned.
     *  Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
     * @var aki\telegram\types\Message
     */
    public $pinned_message;

    /**
     * 	Optional. Message is an invoice for a payment, information about the invoice. 
     * @var aki\telegram\types\Invoice
     */
    public $invoice;

    /**
     * Optional. Message is a service message about a successful payment, information about the payment. 
     * @var aki\telegram\types\InvoiceSuccessfulPayment
     */
    public $successful_payment;

    /**
     * Optional. The domain name of the website on which the user has logged in. 
     * @var String
     */
    public $connected_website;

    /**
     * Optional. Telegram Passport data
     * @var aki\telegram\types\PassportData
     */
    public $passport_data;

    /**
     * Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
     * @var aki\telegram\types\InlineKeyboardMarkup	
     */
    public $reply_markup;








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