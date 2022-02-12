<?php /** @noinspection PhpUnused */

namespace aki\telegram\types\InputMedia;

use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents a chat.
 */
class sendMediaGroup extends Type
{
    public $chat_id;

    /**
     * @var array of InputMediaAudio, InputMediaDocument, InputMediaPhoto and InputMediaVideo
     */
    public $media;
    
    public $disable_notification;

    public $reply_to_message_id;

    public $allow_sending_without_reply;
}
