<?php

namespace aki\telegram;
/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 */
class Telegram extends \yii\base\Component
{
    public $botToken;
    public $botUsername;

    /**
     * @var string SOCKS5 proxy format string: <login>:<password>@<host>:<port>
     */
    public $proxy;

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
        $text = urlencode($option['text']);
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
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" .
                $this->botToken . "/sendPhoto?chat_id=".$chat_id, $option);
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
    *       'user_id' => $chat_id,
    *       'offset' => $offset,//Sequential number of the first photo to be returned. By default, all photos are returned.
    *       'limit' => $limit, //Limits the number of photos to be retrieved. Values between 1—100 are accepted. Defaults to 100.
    *   ]);
    *
    */
    public function getUserProfilePhotos($option){
        $user_id = $option['user_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/getUserProfilePhotos?user_id=".$user_id, $option);
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
    *   Yii::$app->telegram->deleteWebhook();
    *
    */
    public function deleteWebhook(array $option = []){
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
    *   Use this method to send answers to callback queries sent from inline keyboards.
    *   The answer will be displayed to the user as a notification at the top of the chat screen or as an alert.
    *  On success, True is returned.
    */
    public function answerCallbackQuery(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/answerCallbackQuery", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->editMessageText([
    *       'chat_id' => '3343545121', //Optional
    *       'message_id' => 13123, //Optional
    *       'inline_message_id' => 'my alert',  //Optional
    *       'text' => 'my text', //require
    *       'parse_mode' => 123231,  //Optional
    *       'disable_web_page_preview' => false or true,  //Optional
    *       'reply_markup' => Type InlineKeyboardMarkup,  //Optional
    *   ]);
    *   Use this method to edit text and game messages sent by the bot or via the bot (for inline bots). On success,
    *  if edited message is sent by the bot, the edited Message is returned, otherwise True is returned.
    */
    public function editMessageText(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/editMessageText", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->editMessageText([
    *       'chat_id' => '3343545121', //Required
    *       'message_id' => 13123, //Optional
    *       'inline_message_id' => 'my alert',  //Optional
    *       'caption' => 'my text', //require
    *       'reply_markup' => Type InlineKeyboardMarkup,  //Optional
    *   ]);
    *
    *   Use this method to edit captions of messages sent by the bot or via the bot (for inline bots). On success,
    *    if edited message is sent by the bot, the edited Message is returned, otherwise True is returned.
    */
    public function editMessageCaption(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/editMessageCaption", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->sendGame([
    *       'chat_id' => '3343545121', //Required
    *       'game_short_name' => 'myGame', //Required
    *       'disable_notification' => true,  //true or false Optional
    *       'reply_to_message_id' => 123121, //Optional
    *       'reply_markup' => Type InlineKeyboardMarkup,  //Optional
    *   ]);
    *
    *   Use this method to send a game. On success, the sent Message is returned.
    */
    public function sendGame(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/sendGame", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->Game([
    *       'title' => 'Title of the game', //Required
    *       'description' => 'String', //Required
    *       'photo' => Array of PhotoSize,  //Photo that will be displayed in the game message in chats
    *       'text' => 'String', //Optional
    *       'text_entities' => Array of MessageEntity,  //Optional
    *		'animation' => instance of Animation, //Optional
    *   ]);
    *
    *   Use this method to send a game. On success, the sent Message is returned.
    */
    public function Game(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/Game", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->Animation([
    *       'file_id' => String, //Required
    *       'thumb' => PhotoSize, //Optional
    *       'file_name' => String,  //Optional
    *       'mime_type' => String, //Optional
    *   ]);
    *
    *   You can provide an animation for your game so that it looks stylish
    * 	in chats (check out Lumberjack for an example). This object represents an animation file to
    * 	be displayed in the message containing a game.
    */
    public function Animation(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/Animation", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->CallbackGame([
    *       'user_id' => Integer, //Required
    *       'score' => Integer, //Required
    *       'force' => Boolean,  //Optional
    *       'disable_edit_message' => Boolean, //Optional
	*       'chat_id' => Integer,  //Integer
	*       'message_id' => Integer,  //Optional
	*       'inline_message_id' => String,  //Optional
    *   ]);
    *
    *   Use this method to set the score of the specified user in a game. On success,
    *	if the message was sent by the bot, returns the edited Message, otherwise returns True.
    *	Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
    */
    public function CallbackGame(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/CallbackGame", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->getGameHighScores([
    *       'user_id' => Integer, //Required
    *       'chat_id' => Integer, //Optional
    *       'message_id' => Integer,  //Optional
    *       'inline_message_id' => String, //Optional
    *   ]);
    *
    *   Use this method to get data for high score tables.
    *	Will return the score of the specified user and several of his neighbors in a game.
    *	On success, returns an Array of GameHighScore objects.
    */
    public function getGameHighScores(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/getGameHighScores", $option);
        return json_decode($jsonResponse);
    }

    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->GameHighScore([
    *       'position' => Integer, //Required-Position in high score table for the game
    *       'user' => User, //Optional
    *       'score' => Integer,  //Optional
    *   ]);
    *
    *   This object represents one row of the high scores table for a game.
    */
    public function GameHighScore(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/GameHighScore", $option);
        return json_decode($jsonResponse);
    }

    //----------------------begin inline method--------------------------//

    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->answerInlineQuery([
    *       'inline_query_id' => Integer, //Required-Position in high score table for the game
    *       'user' => User, //Optional
    *       'score' => Integer,  //Optional
    *   ]);
    *
    *   This object represents one row of the high scores table for a game.
    */
    public function answerInlineQuery(array $option = [])
    {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/answerInlineQuery", $option);
        return json_decode($jsonResponse);
    }


    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->kickChatMember([
    *       'chat_id' => Integer, //Unique identifier for the target group or username of the target supergroup or channel
    *       'user_id' => Integer, //Unique identifier of the target user
    *       'until_date' => Integer,  //Date when the user will be unbanned, unix time.
    *								 //If user is banned for more than 366 days or less than 30 seconds from the
    *								//current time they are considered to be banned forever
    *   ]);
    *
    *   This object represents one row of the high scores table for a game.
    */
    public function kickChatMember(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/kickChatMember?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }


    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->unbanChatMember([
    *       'chat_id' => Integer, //Unique identifier for the target group or username of the target supergroup or channel
    *       'user_id' => Integer, //Unique identifier of the target user
    *   ]);
    *
    *   This object represents one row of the high scores table for a game.
    */
    public function unbanChatMember(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/unbanChatMember?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }


    /**
    *   @var Array
    *   sample
    *   Yii::$app->telegram->restrictChatMember([
    *       'chat_id' => Integer, //Unique identifier for the target group or username of the target supergroup or *                              //channel
    *       'user_id' => Integer, //Unique identifier of the target user
    *       'until_date' => Integer,  //Date when the user will be unbanned, unix time.
    *								 //If user is banned for more than 366 days or less than 30 seconds from the
    *								//current time they are considered to be banned forever
    *       'can_send_messages' => Boolean	//Pass True, if the user can send text messages,
    * 										//contacts, locations and venues
    *   ]);
    *
    *   Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for *    this to work and must have the appropriate admin rights. Pass True for all boolean parameters to lift *        restrictions from a user. Returns True on success.
    */
    public function restrictChatMember(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/restrictChatMember?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }


    public function promoteChatMember(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/promoteChatMember?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }

    public function exportChatInviteLink(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/exportChatInviteLink?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }

    public function deleteMessage(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/deleteMessage?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }

    public function deleteChatPhoto(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/deleteChatPhoto?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }

    public function setChatTitle(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/setChatTitle?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }

    public function setChatDescription(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/setChatDescription?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }

    public function unpinChatMessage(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/unpinChatMessage?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }

    public function pinChatMessage(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/pinChatMessage?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }

    public function leaveChat(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/leaveChat?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }

    public function setChatStickerSet(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/setChatStickerSet?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }

    public function deleteChatStickerSet(array $option = [])
    {
    	$chat_id = $option['chat_id'];
        unset($option['chat_id']);
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/deleteChatStickerSet?chat_id=".$chat_id, $option);
        return json_decode($jsonResponse);
    }

    public function hook()
    {
        $json = file_get_contents('php://input');
        return json_decode($json);
    }

    /**
    * Yii::$app->telegram->getFile([
	*		'file_id' => $file_id
    *	]);
    *
    */
    public function getFile($option) {
        $jsonResponse = $this->curl_call("https://api.telegram.org/bot" . $this->botToken . "/getFile", $option);
        return json_decode($jsonResponse);
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

    private function curlFile($path){
        if (is_array($path))
            return $path['file_id'];

        $realPath = realpath($path);

        if (class_exists('CURLFile'))
            return new \CURLFile($realPath);

        return '@' . $realPath;
    }

}
