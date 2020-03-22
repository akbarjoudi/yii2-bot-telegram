<?php
namespace aki\telegram\types;

use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * Represents a photo to be sent.
 */
class InputMediaPhoto extends Type
{
    public $type;

    public $media;

    public $caption;

    public $parse_mode;
}