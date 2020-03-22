<?php
namespace aki\telegram\types;


use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object contains information about a poll.
 */
class Poll extends Type
{
    public $id;

    public $question;

    public $options;

    public $total_voter_count;

    public $is_closed;

    public $is_anonymous;

    public $type;

    public $allows_multiple_answers;

    public $correct_option_id;
}