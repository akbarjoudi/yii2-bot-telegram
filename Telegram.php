<?php /** @noinspection PhpUnused, GrazieInspection */

namespace aki\telegram;

use aki\telegram\base\Response;
use aki\telegram\base\TelegramBase;
use GuzzleHttp\Exception\GuzzleException;

/**
 * @author Akbar Joudi <akbar.joody@gmail.com>
 */
class Telegram extends TelegramBase
{
    /**
     * getMe information
     * @throws GuzzleException
     */
    public function getMe(): Response
    {
        $body = $this->send('/getMe');
        return new Response([
            'ok' => $body['ok'],
            'result' => [
                'user' => $body['result']
            ]
        ]);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->sendMessage([
     *       'chat_id' => $chat_id,
     *       'text' => 'test',
     *       'reply_markup' => json_encode($reply_markup)
     *       'reply_to_message_id' => $reply_to_message_id,
     *       'disable_web_page_preview' => $disable_web_page_preview,
     *   ]);
     */
    public function sendMessage(array $params): Response
    {
        $body = $this->send('/sendMessage', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->sendPhoto([
     *       'chat_id' => $chat_id,
     *       'photo' => 'path/to/test.jpg',//realpath
     *       'caption' => $caption,
     *       'reply_to_message_id' => $reply_to_message_id,
     *       'reply_markup' => $reply_markup
     *   ]);
     */
    public function sendPhoto(array $params): Response
    {
        $body = $this->send('/sendPhoto', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->forwardMessage([
     *       'chat_id' => $chat_id,
     *       'from_chat_id' => $from_chat_id,
     *       'message_id' => $message_id,
     *   ]);
     */
    public function forwardMessage(array $params): Response
    {
        $body = $this->send('/forwardMessage', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
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
    public function sendAudio(array $params): Response
    {
        $body = $this->send('/sendAudio', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->sendDocument([
     *       'chat_id' => $chat_id,
     *       'document' => 'path/to/test.pdf',//realpath
     *       'caption' => '',
     *       'reply_to_message_id' => $reply_to_message_id,
     *       'reply_markup' => $reply_markup
     *   ]);
     */
    public function sendDocument(array $params): Response
    {
        $body = $this->send('/sendDocument', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->sendSticker([
     *       'chat_id' => $chat_id,
     *       'sticker' => 'path/to/test.webp',//realpath
     *       'reply_to_message_id' => $reply_to_message_id,
     *       'reply_markup' => $reply_markup
     *   ]);
     */
    public function sendSticker(array $params): Response
    {
        $body = $this->send('/sendSticker', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->sendSticker([
     *       'chat_id' => $chat_id,
     *       'voice' => InputFile or String
     *       'caption' => String,
     *       'parse_mode' => parse_mode,
     *       'duration' => Integer,
     *       'disable_notification' => Boolean,
     *       'reply_to_message_id' => Integer,
     *       'reply_markup' => InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply
     *   ]);
     */
    public function sendVoice(array $params): Response
    {
        $body = $this->send('/sendVoice', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->sendSticker([
     *       'chat_id' => $chat_id,
     *       'video_note' => InputFile or String
     *       'thumb' =>    InputFile or String,
     *       'duration' => Integer,
     *       'duration' => Integer
     *       'disable_notification' => Boolean,
     *       'reply_to_message_id' => Integer,
     *       'reply_markup' => InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply
     *   ]);
     */
    public function sendVideoNote(array $params): Response
    {
        $body = $this->send('/sendVideoNote', $params);
        return new Response($body);
    }

    /**
     * @return Response
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->sendVideo([
     *       'chat_id' => $chat_id,
     *       'video' => 'path/to/test.mp4',//realpath
     *       'duration' => 0,
     *       'width' => Integer,//Video width
     *       'height' => Integer, //Video height
     *       'caption' => $caption,
     *       'reply_to_message_id' => $reply_to_message_id,
     *       'reply_markup' => $reply_markup,
     *       'thumb' => InputFile or String,
     *       'supports_streaming' => Boolean, //Pass True, if the uploaded video is suitable for streaming
     *       'disable_notification' => Boolean,//Sends the message silently. Users will receive a notification with no sound.
     *   ]);
     */
    public function sendVideo(array $params): Response
    {
        $body = $this->send('/sendVideo', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->sendLocation([
     *       'chat_id' => $chat_id,
     *       'latitude' => 37.7576793,
     *       'longitude' => -122.5076402,
     *       'disable_notification' => true,//true||false,
     *       'reply_to_message_id' => $reply_to_message_id,
     *       'reply_markup' => $reply_markup
     *   ]);
     */
    public function sendLocation(array $params): Response
    {
        $body = $this->send('/sendLocation', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->editMessageLiveLocation([
     *       'chat_id' => $chat_id,
     *       'message_id' => 132121,
     *       'inline_message_id' => 321344,
     *       'latitude' => 123.4
     *       'longitude' => 123.4,
     *       'reply_markup' => InlineKeyboardMarkup
     *   ]);
     */
    public function editMessageLiveLocation(array $params): Response
    {
        $body = $this->send('/editMessageLiveLocation', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->stopMessageLiveLocation([
     *       'chat_id' => $chat_id,
     *       'message_id' => 132121,
     *       'inline_message_id' => 321344,
     *       'reply_markup' => InlineKeyboardMarkup
     *   ]);
     */
    public function stopMessageLiveLocation(array $params): Response
    {
        $body = $this->send('/stopMessageLiveLocation', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->sendChatAction([
     *       'chat_id' => $chat_id,
     *       'action' => 'upload_photo',// upload_photo or  record_video  or  upload_video or record_audio or
     *       // upload_audio or upload_document or find_location
     *   ]);
     *
     */
    public function sendChatAction(array $params): Response
    {
        $body = $this->send('/sendChatAction', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->getUserProfilePhotos([
     *       'user_id' => $chat_id,
     *       'offset' => $offset,//Sequential number of the first photo to be returned. By default, all photos are returned.
     *       'limit' => $limit, //Limits the number of photos to be retrieved. Values between 1—100 are accepted. Defaults to 100.
     *   ]);
     *
     */
    public function getUserProfilePhotos($params): Response
    {
        $body = $this->send('/getUserProfilePhotos', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
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
    public function getUpdates(array $params = [])
    {
        return $this->send('/getUpdates', $params);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->setWebhook([
     *       'url' => $url,
     *   ]);
     *
     */
    public function setWebhook(array $params = [])
    {
        return $this->send('/setWebhook', $params);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->deleteWebhook();
     *
     */
    public function deleteWebhook(array $params = [])
    {
        return $this->send('/deleteWebhook', $params);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->getChat([
     *       'chat_id' => '3343545121',
     *   ]);
     *
     */
    public function getChat(array $params = []): Response
    {
        $body = $this->send('/getChat', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->getChatAdministrators([
     *       'chat_id' => '3343545121',
     *   ]);
     *   Use this method to get a list of administrators in a chat.
     */
    public function getChatAdministrators(array $params = []): Response
    {
        $body = $this->send('/getChatAdministrators', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->getChatMembersCount([
     *       'chat_id' => '3343545121',
     *   ]);
     *   Use this method to get the number of members in a chat. Returns Int on success.
     */
    public function getChatMembersCount(array $params = []): Response
    {
        $body = $this->send('/getChatMembersCount', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->getChatMember([
     *       'chat_id' => '3343545121', //Unique identifier for the target chat or
     *            //username of the target supergroup or channel (in  the format @channelusername)
     *       'user_id' => 243243,//Unique identifier of the target user
     *   ]);
     *   Use this method to get information about a member of a chat.
     */
    public function getChatMember(array $params = []): Response
    {
        $body = $this->send('/getChatMember', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
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
    public function answerCallbackQuery(array $params = []): Response
    {
        $body = $this->send('/answerCallbackQuery', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
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
    public function editMessageText(array $params = []): Response
    {
        $body = $this->send('/editMessageText', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
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
    public function editMessageCaption(array $params = []): Response
    {
        $body = $this->send('/editMessageCaption', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
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
    public function sendGame(array $params = []): Response
    {
        $body = $this->send('/sendGame', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->Game([
     *       'title' => 'Title of the game', //Required
     *       'description' => 'String', //Required
     *       'photo' => Array of PhotoSize,  //Photo that will be displayed in the game message in chats
     *       'text' => 'String', //Optional
     *       'text_entities' => Array of MessageEntity,  //Optional
     *        'animation' => instance of Animation, //Optional
     *   ]);
     *
     *   Use this method to send a game. On success, the sent Message is returned.
     */
    public function Game(array $params = []): Response
    {
        $body = $this->send('/Game', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->Animation([
     *       'chat_id' => String, //Required
     *       'animation' => InputFile or String, //Optional
     *       'duration' => Integer,  //Optional
     *       'width' => Integer, //Optional,
     *       'height' => Integer,
     *       'thumb' =>    InputFile or String,
     *       'caption' => String,
     *       'parse_mode' => String,
     *       'disable_notification' => Boolean,
     *       'reply_to_message_id' => Integer
     *       'reply_markup' => InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply
     *   ]);
     *
     *   You can provide an animation for your game so that it looks stylish
     *    in chats (check out Lumberjack for an example). This object represents an animation file to
     *    be displayed in the message containing a game.
     */
    public function sendAnimation(array $params = []): Response
    {
        $body = $this->send('/sendAnimation', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
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
     *    if the message was sent by the bot, returns the edited Message, otherwise returns True.
     *    Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
     */
    public function CallbackGame(array $params = []): Response
    {
        $body = $this->send('/CallbackGame', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->getGameHighScores([
     *       'user_id' => Integer, //Required
     *       'chat_id' => Integer, //Optional
     *       'message_id' => Integer,  //Optional
     *       'inline_message_id' => String, //Optional
     *   ]);
     *
     *   Use this method to get data for high score tables.
     *    Will return the score of the specified user and several of his neighbors in a game.
     *    On success, returns an Array of GameHighScore objects.
     */
    public function getGameHighScores(array $params = []): Response
    {
        $body = $this->send('/getGameHighScores', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->GameHighScore([
     *       'position' => Integer, //Required-Position in high score table for the game
     *       'user' => User, //Optional
     *       'score' => Integer,  //Optional
     *   ]);
     *
     *   This object represents one row of the high scores table for a game.
     */
    public function GameHighScore(array $params = []): Response
    {
        $body = $this->send('/GameHighScore', $params);
        return new Response($body);
    }

    //----------------------begin inline method--------------------------//

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->answerInlineQuery([
     *       'inline_query_id' => Integer, //Required-Position in high score table for the game
     *       'user' => User, //Optional
     *       'score' => Integer,  //Optional
     *   ]);
     *
     *   This object represents one row of the high scores table for a game.
     */
    public function answerInlineQuery(array $params = []): Response
    {
        $body = $this->send('/answerInlineQuery', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->inlineQuery([
     *       'id' => Integer, //Unique identifier for this query
     *       'from' => User, //Sender
     *       'location' => Location,  //Optional. Sender location, only for bots that request user location
     *       'query' => String,  //Text of the query (up to 256 characters)
     *       'offset' => String,  //Offset of the results to be returned, can be controlled by the bot
     *   ]);
     *
     *   This object represents one row of the high scores table for a game.
     */
    public function inlineQuery(array $params = []): Response
    {
        $body = $this->send('/inlineQuery', $params);
        return new Response($body);
    }


    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->kickChatMember([
     *       'chat_id' => Integer, //Unique identifier for the target group or username of the target supergroup or channel
     *       'user_id' => Integer, //Unique identifier of the target user
     *       'until_date' => Integer,  //Date when the user will be unbanned, unix time.
     *                                 //If user is banned for more than 366 days or less than 30 seconds from the
     *                                //current time they are considered to be banned forever
     *   ]);
     *
     *   This object represents one row of the high scores table for a game.
     */
    public function kickChatMember(array $params = []): Response
    {
        $body = $this->send('/kickChatMember', $params);
        return new Response($body);
    }


    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->unbanChatMember([
     *       'chat_id' => Integer, //Unique identifier for the target group or username of the target supergroup or channel
     *       'user_id' => Integer, //Unique identifier of the target user
     *   ]);
     *
     */
    public function unbanChatMember(array $params = []): Response
    {
        $body = $this->send('/unbanChatMember', $params);
        return new Response($body);
    }


    /**
     * @throws GuzzleException
     * @var array
     *   sample
     *   Yii::$app->telegram->restrictChatMember([
     *       'chat_id' => Integer, //Unique identifier for the target group or username of the target supergroup or *                              //channel
     *       'user_id' => Integer, //Unique identifier of the target user
     *       'until_date' => Integer,  //Date when the user will be unbanned, unix time.
     *                                 //If user is banned for more than 366 days or less than 30 seconds from the
     *                                //current time they are considered to be banned forever
     *       'can_send_messages' => Boolean    //Pass True, if the user can send text messages,
     *                                        //contacts, locations and venues
     *   ]);
     *
     *   Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for *    this to work and must have the appropriate admin rights. Pass True for all boolean parameters to lift *        restrictions from a user. Returns True on success.
     */
    public function restrictChatMember(array $params = []): Response
    {
        $body = $this->send('/restrictChatMember', $params);
        return new Response($body);
    }


    /**
     * @throws GuzzleException
     */
    public function promoteChatMember(array $params = []): Response
    {
        $body = $this->send('/promoteChatMember', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     */
    public function exportChatInviteLink(array $params = []): Response
    {
        $body = $this->send('/exportChatInviteLink', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     */
    public function deleteMessage(array $params = []): Response
    {
        $body = $this->send('/deleteMessage', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     */
    public function deleteChatPhoto(array $params = []): Response
    {
        $body = $this->send('/deleteChatPhoto', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     */
    public function setChatTitle(array $params = []): Response
    {
        $body = $this->send('/setChatTitle', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     */
    public function setChatDescription(array $params = []): Response
    {
        $body = $this->send('/setChatDescription', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     */
    public function unpinChatMessage(array $params = []): Response
    {
        $body = $this->send('/unpinChatMessage', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     */
    public function pinChatMessage(array $params = []): Response
    {
        $body = $this->send('/pinChatMessage', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     */
    public function leaveChat(array $params = []): Response
    {
        $body = $this->send('/leaveChat', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     */
    public function setChatStickerSet(array $params = []): Response
    {
        $body = $this->send('/setChatStickerSet', $params);
        return new Response($body);
    }

    /**
     * @throws GuzzleException
     */
    public function deleteChatStickerSet(array $params = []): Response
    {
        $body = $this->send('/deleteChatStickerSet', $params);
        return new Response($body);
    }

    /**
     * Yii::$app->telegram->getFile([
     *        'file_id' => $file_id
     *    ]);
     *
     * @throws GuzzleException
     */
    public function getFile($params)
    {
        return $this->send('/getFile', $params);
    }

    /**
     * Yii::$app->telegram->getFileUrl([
     *        'file_id' => $file_id
     *    ]);
     *
     * Return file url by file_id
     * @throws GuzzleException
     */
    public function getFileUrl($params)
    {
        $body = json_decode(json_encode($this->send('/getFile', $params)), false);
        if (isset($body->result, $body->result->file_path) && $body->ok) {
            return 'https://api.telegram.org/file/bot' . $this->botToken . '/' . $body->result->file_path;
        }
        return false;
    }

    /**
     * @throws GuzzleException
     */
    public function sendMediaGroup($params)
    {
        return $this->send('/sendMediaGroup', $params);
    }

}
