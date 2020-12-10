<?php
namespace aki\telegram\types;


use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 */
class ForwardFrom extends Type
{
    public $id;

    public $is_bot;

    public $first_name;

    public $last_name;

    public $username;

    public $language_code;
}