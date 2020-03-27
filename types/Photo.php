<?php
namespace aki\telegram\types;


use aki\telegram\base\Type;

/**
 * 
 */
class Photo extends Type
{
    public $photoSize = [];

    public function __construct($config)
    {
        foreach($config as $attribute)
        {
            $this->photoSize[] = new PhotoSize($attribute);
        }
    }

}