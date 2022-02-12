<?php /** @noinspection PhpUnused */

namespace aki\telegram\types\InputMedia;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * Represents an animation file (GIF or H.264/MPEG-4 AVC video without sound) to be sent.
 */
class InputMediaAnimation extends InputMedia
{
    public $type;

    public $media;

    public $thumb;

    public $caption;

    public $parse_mode;

    public $width;

    public $height;

    public $duration;
}
