<?php /** @noinspection PhpUnused */

namespace aki\telegram\types\InputMedia;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * Represents a photo to be sent.
 */
class InputMediaPhoto extends InputMedia
{
    public $type;

    public $media;

    public $caption = '';

    public $parse_mode = '';
}
