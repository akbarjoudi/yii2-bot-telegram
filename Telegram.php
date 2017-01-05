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
        $chat_id = $option['chat_id'];
        $text = $option['text'];
        unset($option['chat_id']);
        unset($option['text']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendMessage?chat_id=".$chat_id
                .'&text='.$text, $option);
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
        $chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/forwardMessage?chat_id=".$chat_id, $option);
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
        $chat_id = $option['chat_id'];
        $caption = $option['caption'];
        unset($option['chat_id']);
        unset($option['caption']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" .
                $this->botToken . "/sendPhoto?chat_id=".$chat_id.
                '&caption='. $caption,
                $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->sendAudio[
    *       'chat_id' => $chat_id,
    *       'audio' => 'path/to/test.ogg',//realpath
    *       'caption' => '', 
    *       'duration' => 0,
    *       'reply_to_message_id' => $reply_to_message_id,
    *       'reply_markup' => $reply_markup
    *   ]);
    */
    public function sendAudio(array $option){
        $chat_id = $option['chat_id'];
        $caption = $option['caption'];
        unset($option['chat_id']);
        unset($option['caption']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendAudio?chat_id=".$chat_id.
                '&caption='.$caption, $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->sendDocument([
    *       'chat_id' => $chat_id,
    *       'document' => 'path/to/test.pdf',//realpath
    *       'caption' => '',
    *       'reply_to_message_id' => $reply_to_message_id,
    *       'reply_markup' => $reply_markup
    *   ]);
    */
    public function sendDocument(array $option){
        $chat_id = $option['chat_id'];
        $caption = $option['caption'];
        unset($option['chat_id']);
        unset($option['caption']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendDocument?chat_id=".$chat_id
                .'&caption='.$caption, $option);
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
        $chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendSticker?chat_id=".$chat_id, $option);
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
        $chat_id = $option['chat_id'];
        $caption = $option['caption'];
        unset($option['chat_id']);
        unset($option['caption']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken .
                "/sendVideo?chat_id=".$chat_id
                .'&caption='. $caption, $option);
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
        $chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendLocation?chat_id=".$chat_id, $option);
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
        $chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendChatAction?chat_id=".$chat_id, $option);
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
        $chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/getUserProfilePhotos?chat_id=".$chat_id, $arrayPost);
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

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->getChat([
    *       'chat_id' => '3343545121',
    *   ]);
    *   
    */
    public function getChat(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/getChat", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->getChatAdministrators([
    *       'chat_id' => '3343545121',
    *   ]);
    *   Use this method to get a list of administrators in a chat.
    */
    public function getChatAdministrators(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/getChatAdministrators", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->getChatMembersCount([
    *       'chat_id' => '3343545121',
    *   ]);
    *   Use this method to get the number of members in a chat. Returns Int on success.
    */
    public function getChatMembersCount(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/getChatMembersCount", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->getChatMember([
    *       'chat_id' => '3343545121', //Unique identifier for the target chat or 
    *            //username of the target supergroup or channel (in  the format @channelusername)
    *       'user_id' => 243243,//Unique identifier of the target user
    *   ]);
    *   Use this method to get information about a member of a chat.
    */
    public function getChatMember(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/getChatMember", $option);
        return json_decode($jsonResponse);
    }
    
    /**
    *   @var Array 
    *   sample
    *   Yii::$app->telegram->answerCallbackQuery([
    *       'callback_query_id' => '3343545121', //require
    *       'text' => 'text', //Optional
    *       'show_alert' => 'my alert',  //Optional
    *       'url' => 'http://sample.com', //Optional
    *       'cache_time' => 123231,  //Optional
    *   ]);
    *   Use this method to get information about a member of a chat.
    */
    public function answerCallbackQuery(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/answerCallbackQuery", $option);
        return json_decode($jsonResponse);
    }
    
    public function hook()
    {
        $json = file_get_contents('php://input');
        return json_decode($json);
    }

    

    private function array_push_assoc(&$array, $key, $value){
       $array[$key] = $value;
    }

    private function curl_call($url, $option=array(), $headers=array()){
        $attachments = ['photo', 'sticker', 'audio', 'document', 'video'];
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, "PostManGoBot 1.0");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
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
            echo 'eror '.curl_error($ch);
        }
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
