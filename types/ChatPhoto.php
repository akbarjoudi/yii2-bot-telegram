<?php
namespace aki\telegram\types;


use yii\base\Component;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents a chat photo.
 */
class ChatPhoto extends Component
{
    public $small_file_id;

    public $small_file_unique_id;

    public $big_file_id;

    public $big_file_unique_id;
}   