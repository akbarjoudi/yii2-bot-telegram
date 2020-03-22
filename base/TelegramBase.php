<?php

namespace aki\telegram\base;


/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 */
class TelegramBase extends Type
{
    public $apiUrl = "https://api.telegram.org/bot";
    /**
     * Token taken from botFather
     * @var string
     */
    public $botToken;

    /**
     * 
     */
    public $botUsername;

    /**
     * @var string SOCKS5 proxy format string: <login>:<password>@<host>:<port>
     */
    public $proxy;

    /**
     * Data sent to us from the telegram server
     * @var aki\components\input
     */
    private $_input;

    /**
     * 
     */
    public function __construct($config = [])
    {
        
        parent::__construct($config);

        $input = file_get_contents("php://input");
        $array= json_decode($input, true);
        $this->input = new Input($array);

    }

    
    /**
     * 
     */
    public function getInput()
    {
        return $this->_input;
    }

    /**
     * 
     */
    public function setInput($res)
    {
        $this->_input = $res;
    }

    public function hook()
    {
        $json = file_get_contents('php://input');
        return json_decode($json);
    }

    /**
     * array_push_assoc
     */
    protected function array_push_assoc(&$array, $key, $value){
       $array[$key] = $value;
    }

    /**
     *  call url
     * @return json
     */
    protected function curl_call($url, $option=array(), $headers=array()){
        $attachments = ['photo', 'sticker', 'audio', 'document', 'video'];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, "PostManGoBot 1.0");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($this->proxy !== null) {
            // if a proxy string is specified, add header
            curl_setopt($ch, CURLOPT_PROXY, "socks5://{$this->proxy}");
        }

        if (count($option)) {
            curl_setopt($ch, CURLOPT_POST, true);

            foreach($attachments as $attachment){
                if(isset($option[$attachment])){
                    $option[$attachment] = $this->curlFile($option[$attachment]);
                    break;
                }
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $option);
        }
        $r = curl_exec($ch);
        if($r == false){
            $text = 'eroror '.curl_error($ch);
            $myfile = fopen("error_telegram.log", "w") or die("Unable to open file!");
            fwrite($myfile, $text);
            fclose($myfile);
        }
        curl_close($ch);
        return $r;
    }

    /**
     * @return string
     */
    protected function curlFile($path){
        if (is_array($path))
            return $path['file_id'];

        $realPath = realpath($path);

        if (class_exists('CURLFile'))
            return new \CURLFile($realPath);

        return '@' . $realPath;
    }

}
