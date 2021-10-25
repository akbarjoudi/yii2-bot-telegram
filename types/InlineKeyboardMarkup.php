<?php
namespace aki\telegram\types;


use aki\telegram\base\Type;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 * This object represents an inline keyboard that appears right next to the message it belongs to.
 */
class InlineKeyboardMarkup extends Type
{
    public $inline_keyboard;

    public function __construct($config)
    {
        
        $data = $config['inline_keyboard'];
        for ($i=0; $i < count($data); $i++) { 
            for ($j=0; $j < count($data[$i]); $j++) { 
                $this->inline_keyboard[$i][$j] = new InlineKeyboardButton($data[$i][$j]);
            }
        }
    }
    
}