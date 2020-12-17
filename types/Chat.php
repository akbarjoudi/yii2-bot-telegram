<?php

namespace aki\telegram\types;


use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents a chat.
 */
class Chat extends Type
{
    /**
     * Unique identifier for this chat.
     *  This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. 
     * But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     * 
     * @var Integer
     */
    public $id;

    public $update_id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     * @var String
     */
    public $type;

    /**
     * Optional. Title, for supergroups, channels and group chats
     * @var String
     */
    public $title;

    /**
     * Optional. Username, for private chats, supergroups and channels if available
     * @var String
     */
    public $username;

    /**
     * Optional. First name of the other party in a private chat
     * @var String
     */
    public $first_name;

    /**
     * Optional. Last name of the other party in a private chat
     * @var String
     */
    public $last_name;

    /**
     * Optional. Chat photo. Returned only in getChat.
     * @var aki\telegram\types\ChatPhoto
     */
    public $photo;

    /**
     * Optional. Description, for groups, supergroups and channel chats. Returned only in getChat.
     * @var String
     */
    public $description;

    /**
     *  @var String
     * Optional. Chat invite link, for groups, supergroups and channel chats.
     *  Each administrator in a chat generates their own invite links, 
     * so the bot must first generate the link using exportChatInviteLink. 
     * Returned only in getChat.
     */
    public $invite_link;

    /**
     * Optional. Pinned message, for groups, supergroups and channels. Returned only in getChat.
     * @var aki\telegram\types\Message
     */
    public $pinned_message;

    /**
     * Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
     * @var aki\telegram\types\ChatPermissions
     */
    public $permissions;

    /**
     * Optional. For supergroups, 
     * the minimum allowed delay between consecutive messages sent by each unpriviledged user.
     *  Returned only in getChat.
     * @var Integer
     */
    public $slow_mode_delay;

    /**
     * Optional. For supergroups, name of group sticker set. Returned only in getChat.
     *  @var String
     */
    public $sticker_set_name;

    /**
     * Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     * @var Boolean
     */
    public $can_set_sticker_set;

    /**
     * deprecated
     */
    public $all_members_are_administrators;
}
