<h1 align="center">
Yii2 bot telegram
</h1>
<p align="center">
	<img width="200px" src="https://i.ibb.co/JQxDZWH/telegram.png">
</p>
<p align="center">

[![Latest Stable Version](https://poser.pugx.org/aki/yii2-bot-telegram/version)](//packagist.org/packages/aki/yii2-bot-telegram)
[![Total Downloads](https://poser.pugx.org/aki/yii2-bot-telegram/downloads)](https://packagist.org/packages/aki/yii2-bot-telegram)
[![Latest Unstable Version](https://poser.pugx.org/aki/yii2-bot-telegram/v/unstable)](https://packagist.org/packages/aki/yii2-bot-telegram)
[![License](https://poser.pugx.org/aki/yii2-bot-telegram/license)](https://packagist.org/packages/aki/yii2-bot-telegram)
[![Monthly Downloads](https://poser.pugx.org/aki/yii2-bot-telegram/d/monthly)](https://packagist.org/packages/aki/yii2-bot-telegram)
[![Daily Downloads](https://poser.pugx.org/aki/yii2-bot-telegram/d/daily)](//packagist.org/packages/aki/yii2-bot-telegram)
</p>

## Установка

Предпочтительный способ установки этого расширения через [composer](http://getcomposer.org/download/).

Либо беги

```
php composer.phar require aki/yii2-bot-telegram "*"
```

или добавить

```
"aki/yii2-bot-telegram": "*"
```

в требуемый раздел вашего `composer.json` файла.

## Список используемых методов

```
getMe
sendMessage
forwardMessage
sendPhoto
sendAudio
sendDocument
sendSticker
sendVideo
sendLocation
sendChatAction
getUserProfilePhotos
getUpdates
setWebhook
getChat
getChatAdministrators
getChatMembersCount
getChatMember
answerCallbackQuery
editMessageText
editMessageCaption
sendGame
Game
Animation
CallbackGame
getGameHighScores
GameHighScore
answerInlineQuery
setChatStickerSet
deleteChatStickerSet
leaveChat
pinChatMessage
unpinChatMessage
setChatDescription
setChatTitle
deleteChatPhoto 
exportChatInviteLink 
promoteChatMember
restrictChatMember
unbanChatMember
kickChatMember
editMessageLiveLocation
stopMessageLiveLocation
```

## Применение

сначала добавьте в config.php

```php
<?php
'components' => [
    'telegram' => [
        'class' => 'aki\telegram\Telegram',
        'botToken' => '112488045:AAGs6CVXgaqC92pvt1u0L6Azfsdfd',
    ]
]
?>
```

После установки расширения просто используйте его в своем коде:

```php
<?php Yii::$app->telegram->sendMessage([
	'chat_id' => $chat_id,
	'text' => 'test',
]); ?>
```

отправить сообщение со встроенной клавиатурой:

```php
<?php Yii::$app->telegram->sendMessage([
        'chat_id' => $chat_id,
        'text' => 'this is test',
        'reply_markup' => json_encode([
            'inline_keyboard'=>[
                [
                    ['text'=>"refresh",'callback_data'=> time()]
                ]
            ]
        ]),
    ]); ?>
```

отправить фото:

```php
<?php 
Yii::$app->telegram->sendPhoto([
	'chat_id' => $chat_id,
	'photo' => Yii::$app->getBaseUrl().'/uploads/test.jpg',
	'caption' => 'this is test'
]); ?>
```

## Использование в Controller

Прежде всего вам нужно отключить enableCsrfValidation в контроллере. 

Бот работает с вашего сервера. Но когда мы начнем запускать бота из приложения Телеграмма `/start`, запрос не достигает 
действия внутри контроллера, потому что Телеграмм отправляет запрос в POST без csrf, в этом случае будет ошибка Bad 
Request (# 400). 

```php
class SiteController extends Controller
{
	public $enableCsrfValidation = false;

	public function actionIndex()
    {
        $res = Yii::$app->telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => 'hello world!!' 
        ]);
       
    }
}
```

## :bulb: Образец кода:

### Как получить от бота пользовательский chat_id?

>__Вы можете использовать: `$telegram->input->message->chat->id` для получения chat_id__

Пример класса виджета:

```php
$res = Yii::$app->telegram->sendMessage([
	'chat_id' => $telegram->input->message->chat->id,
	'text' => "salam"
]);
```

## :gem: Новая функция Command

Как пользоваться командой

```php
use aki\telegram\base\Command;

Command::run("/start", function($telegram){
   $result = $telegram->sendMessage([
      'chat_id' => $telegram->input->message->chat->id,
      "text" => "hello"
   ]);
});
```
