<?php
namespace aki\telegram\types;

use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents an incoming callback query from a callback button in an inline keyboard.
 * If the button that originated the query was attached to a message sent by the bot,
 * the field message will be present. If the button was attached to a message sent via the bot (in inline mode),
 * the field inline_message_id will be present. Exactly one of the fields data or game_short_name will be present
 */
class CallbackQuery extends Type
{
    public $id;

    public $from;

    public $message;

    public $inline_message_id;

    public $chat_instance;

    public $data;

    public $game_short_name;
}