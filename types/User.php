<?php
namespace aki\telegram\types;


use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents a Telegram user or bot.
 */
class User extends Type
{
    /**
     * Unique identifier for this user or bot
     * @var Integer
     */
    public $id;

    /**
     * True, if this user is a bot
     * @var Boolean
     */
    public $is_bot;

    /**
     * User‘s or bot’s first name
     * @var String
     */
    public $first_name;

    /**
     * Optional. User‘s or bot’s last name
     * @var String
     */
    public $last_name;

    /**
     * Optional. User‘s or bot’s username
     * @var String
     */
    public $username;

    /**
     * Optional. IETF language tag of the user's language
     * @var String
     */
    public $language_code;

    /**
     * Optional. True, if the bot can be invited to groups. Returned only in getMe.
     * @var Boolean
     */
    public $can_join_groups;

    /**
     * Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
     * @var Boolean
     */
    public $can_read_all_group_messages;

    /**
     * Optional. True, if the bot supports inline queries. Returned only in getMe.
     * @var Boolean
     */
    public $supports_inline_queries;


}