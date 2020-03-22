<?php
namespace aki\telegram\types;


use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represent a user's profile pictures.
 */
class UserProfilePhotos extends Type
{
    public $total_count;

    public $photos;
}