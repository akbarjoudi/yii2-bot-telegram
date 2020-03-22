<?php
namespace aki\telegram\types;


use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents a venue.
 */
class Venue extends Type
{
    public $location;

    public $title;

    public $address;

    public $foursquare_id;

    public $foursquare_type;
    
}