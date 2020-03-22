<?php
namespace aki\telegram\types;


use aki\telegram\base\Type;
/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is pressed.
 */
class KeyboardButtonPollType extends Type
{
    public $type;
}