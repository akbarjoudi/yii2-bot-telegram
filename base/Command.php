<?php
namespace aki\telegram\base;

use Closure;
use Yii;
use yii\base\Component;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 */
class Command extends Component{
    

    /**
     *  run command bot
     * @param String $command
     * @param Callable $fun
     */
    public static function run($command, callable $fun){
        $telegram = Yii::$app->telegram;
        $text = $telegram->input->message->text;
        $args = explode(' ', $text);
        $inputCommand = array_shift($args);
        if($inputCommand === $command){
            return call_user_func_array($fun, [$telegram, $args]);
        }
    }
}