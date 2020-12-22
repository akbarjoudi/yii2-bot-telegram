<?php
namespace aki\telegram\types\InputMedia;

use GuzzleHttp\Psr7\Stream;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * Represents a photo to be sent.
 */
class InputMediaPhoto extends InputMedia
{
    public $type;

    public $media;

    public $caption = "";

    public $parse_mode = "";

}