<?php
namespace aki\telegram\types;

use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents an answer of a user in a non-anonymous poll.
 */
class PollAnswer extends Type
{
    public $poll_id;

    public $user;

    public $option_ids;
}