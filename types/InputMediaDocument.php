<?php
namespace aki\telegram\types;

use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * Represents a general file to be sent.
 */
class InputMediaDocument extends Type
{
    public $type;

    public $media;

    public $thumb;

    public $caption;

    public $parse_mode;
}