<?php
namespace aki\telegram\types;


use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * 
 */
class Entities extends Type
{
    public $entities = [];

    public function __construct($config)
    {
        foreach($config as $attribute)
        {
            $this->entities[] = new Entitie($attribute);
        }
    }

}