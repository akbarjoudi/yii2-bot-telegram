<?php /** @noinspection PhpUnused */

namespace aki\telegram\types\InputMedia;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * Represents a general file to be sent.
 */
class InputMediaDocument extends InputMedia
{
    public $type;

    public $media;

    public $thumb;

    public $caption;

    public $parse_mode;
}
