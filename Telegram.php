<?php

namespace aki\telegram;
/**
 * This is just an example.
 */
class Telegram extends \yii\base\Component
{
    public $botToken;
    public $botUsername;


    public function getMe()
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/getMe");
        return $jsonResponse;
    }
    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->sendMessage([
    *       'chat_id' => $chat_id,
    *       'text' => 'test',
    *       'reply_markup' => json_encode($reply_markup)
    *       'reply_to_message_id' => $reply_to_message_id,
    *       'disable_web_page_preview' => $disable_web_page_preview, 
    *   ]);
    */
    public function sendMessage(array $option){

        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendMessage", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->forwardMessage([
    *       'chat_id' => $chat_id,
    *       'from_chat_id' => $from_chat_id,
    *       'message_id' => $message_id,
    *   ]);
    */
    public function forwardMessage(array $option){
    	$jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/forwardMessage", $option);
        return json_decode($jsonResponse);
    }
    
    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->sendPhoto([
    *       'chat_id' => $chat_id,
    *       'photo' => 'path/to/test.jpg',//realpath
    *       'caption' => $caption,
    *       'reply_to_message_id' => $reply_to_message_id,
    *       'reply_markup' => $reply_markup
    *   ]);
    */
    public function sendPhoto(array $option){
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendPhoto", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->sendAudio[
    *       'chat_id' => $chat_id,
    *       'audio' => 'path/to/test.ogg',//realpath
    *       'duration' => 0,
    *       'reply_to_message_id' => $reply_to_message_id,
    *       'reply_markup' => $reply_markup
    *   ]);
    */
    public function sendAudio(array $option){
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendAudio", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->sendDocument([
    *       'chat_id' => $chat_id,
    *       'document' => 'path/to/test.pdf',//realpath
    *       'reply_to_message_id' => $reply_to_message_id,
    *       'reply_markup' => $reply_markup
    *   ]);
    */
    public function sendDocument(array $option){
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendDocument", $option);
        return json_decode($jsonResponse);
    }
    
    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->sendSticker([
    *       'chat_id' => $chat_id,
    *       'sticker' => 'path/to/test.webp',//realpath
    *       'reply_to_message_id' => $reply_to_message_id,
    *       'reply_markup' => $reply_markup
    *   ]);
    */
    public function sendSticker(array $option){
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendSticker", $option);
        return json_decode($jsonResponse);
    }
    
    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->sendVideo([
    *       'chat_id' => $chat_id,
    *       'video' => 'path/to/test.mp4',//realpath
    *       'duration' => 0,
    *       'caption' => $caption,
    *       'reply_to_message_id' => $reply_to_message_id,
    *       'reply_markup' => $reply_markup
    *   ]);
    */
    public function sendVideo(array $option){
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendVideo", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->sendVideo([
    *       'chat_id' => $chat_id,
    *       'latitude' => 37.7576793,
    *       'longitude' => -122.5076402,
    *       'disable_notification' => true,//true||false,
    *       'reply_to_message_id' => $reply_to_message_id,
    *       'reply_markup' => $reply_markup
    *   ]);
    */
    public function sendLocation(array $option){
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendLocation", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->sendChatAction([
    *       'chat_id' => $chat_id,
    *       'action' => 'upload_photo',// upload_photo or  record_video  or  upload_video or record_audio or 
    *       // upload_audio or upload_document or find_location
    *   ]);
    *   
    */
    public function sendChatAction(array $option){
    	$arrayPost = array('chat_id' => $chat_id, 'action' => $action);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendChatAction", $option);
        return json_decode($jsonResponse);
    }
    
    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->getUserProfilePhotos([
    *       'chat_id' => $chat_id,
    *       'offset' => $offset,//Sequential number of the first photo to be returned. By default, all photos are returned.
    *       'limit' => $limit, //Limits the number of photos to be retrieved. Values between 1—100 are accepted. Defaults to 100.
    *   ]);
    *   
    */
    public function getUserProfilePhotos($user_id, $offset = false, $limit = false){
    	$arrayPost = array('user_id' => $user_id);
    	if($offset)
    		$this->array_push_assoc($arrayPost, 'offset', $offset);
    	if($limit)
    		$this->array_push_assoc($arrayPost, 'limit', $limit);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/getUserProfilePhotos", $arrayPost);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->getUpdates([
    *       'offset' => $offset,//Identifier of the first update to be returned. Must be greater by one than the highest among the *            //identifiers of previously received updates. 
    *           //By default, updates starting with the earliest unconfirmed update are returned.
    *           //An update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id.
    *           //The negative offset can be specified to retrieve updates starting from -offset 
    *           //update from the end of the updates queue.
    *       'limit' => $limit,//Limits the number of updates to be retrieved. Values between 1—100 are accepted. Defaults to 100.
    *       'timeout' => $timeout,//Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling
    *   ]);
    *   
    */
    public function getUpdates(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/getUpdates", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->setWebhook([
    *       'url' => $url,
    *   ]);
    *   
    */
    public function setWebhook(array $option = []){
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/setWebhook", $option);
        return json_decode($jsonResponse);
    }

    public function hook()
    {
        $json = file_get_contents('php://input');
        return json_decode($json);
    }

    public function test($json)
    {
        $json = json_decode($json, true);
        if($this->botUsername == $json['result']['username'])
            return true;
        else
            return false;
    }

    private function array_push_assoc(&$array, $key, $value){
	   $array[$key] = $value;
    }

    private function curl_call($url, $post=array(), $headers=array()){
        $attachments = ['photo', 'sticker', 'audio', 'document', 'video'];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, "PostManGoBot 1.0");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (count($post)) {
            curl_setopt($ch, CURLOPT_POST, true);

            foreach($attachments as $attachment){
                if(isset($post[$attachment])){
                    $post[$attachment] = $this->curlFile($post[$attachment]);
                    break;
                }
            }
            $feild = http_build_query($post);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $feild);
        }
        $r = curl_exec($ch);
        curl_close($ch);
        return $r;
    }

    private function curlFile($path){
        if (is_array($path))
            return $path['file_id'];

        $realPath = realpath($path);

        if (class_exists('CURLFile'))
            return new \CURLFile($realPath);

        return '@' . $realPath;
    }

}
