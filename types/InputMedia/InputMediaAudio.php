<?php /** @noinspection PhpUnused */

namespace aki\telegram\types\InputMedia;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * Represents an audio file to be treated as music to be sent.
 */
class InputMediaAudio extends InputMedia
{
    public $type;

    public $media;

    public $thumb;

    public $caption;

    public $parse_mode;

    public $duration;

    public $performer;

    public $title;
}
