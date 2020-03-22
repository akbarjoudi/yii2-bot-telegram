<?php
namespace aki\telegram\types;

use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents a point on the map.
 */
class Location extends Type
{
    public $longitude;

    public $latitude;
}