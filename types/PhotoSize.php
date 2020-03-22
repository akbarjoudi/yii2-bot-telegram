<?php
namespace aki\telegram\types;


use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents one size of a photo or a file / sticker thumbnail.
 */
class PhotoSize extends Type
{
    /**
     * Identifier for this file, which can be used to download or reuse the file
     * @var String
     */
    public $file_id;

    /**
     * Unique identifier for this file,
     *  which is supposed to be the same over time and for different bots.
     *  Can't be used to download or reuse the file.
     * @var String
     */
    public $file_unique_id;

    /**
     * Photo width
     * @var Integer
     */
    public $width;

    /**
     * Photo height
     * @var Integer
     */
    public $height;

    /**
     * Optional. File size
     * @var Integer
     */
    public $file_size;
    
}