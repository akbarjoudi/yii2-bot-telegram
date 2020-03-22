<?php
namespace aki\telegram\types;

use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 */
class Document extends Type
{
    public $file_id;

    public $file_unique_id;

    public $thumb;

    public $file_name;

    public $mime_type;

    public $file_size;
    
}