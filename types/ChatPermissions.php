<?php
namespace aki\telegram\types;


use yii\base\Component;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * Describes actions that a non-administrator user is allowed to take in a chat.
 */
class ChatPermissions extends Component
{
    public $can_send_messages;

    public $can_send_media_messages;

    public $can_send_polls;

    public $can_send_other_messages;

    public $can_add_web_page_previews;

    public $can_change_info;
    
    public $can_invite_users;

    public $can_pin_messages;
}