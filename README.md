Yii2 bot telegram
============
for web application yii2

Create your first bot
------------
1. Message @botfather https://telegram.me/botfather with the following text: /newbot If you don't know how to message by username, click the search field on your Telegram app and type @botfather, where you should be able to initiate a conversation. Be careful not to send it to the wrong contact, because some users has similar usernames to ```botfather.```
![alt tag](https://camo.githubusercontent.com/bf027eeda4a225838aac3c7e3f8b91484d358cca/687474703a2f2f692e696d6775722e636f6d2f614932366978522e706e67)

2. @botfather replies with Alright, a new bot. How are we going to call it? Please choose a name for your bot.

3. Type whatever name you want for your bot.

4. @botfather replies with Good. Now let's choose a username for your bot. It must end in `bot`. Like this, for example: PostManGoBot or PostManGo_bot.

5. Type whatever username you want for your bot, minimum 5 characters, and must end with bot. For example: PostMan_bot

6. @botfather replies with:
```
Done! Congratulations on your new bot. You will find it at
telegram.me/telesample_bot. You can now add a description, about
section and profile picture for your bot, see /help for a list of
commands.

Use this token to access the HTTP API:
123456789:AAG90e14-0f8-40183D-18491dDE

For a description of the Bot API, see this page:
https://core.telegram.org/bots/api
```

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require aki/yii2-bot-telegram "*"
```

or add

```
"aki/yii2-bot-telegram": "*"
```

to the require section of your `composer.json` file.

Method list usable
-----
list methods
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
```

Usage
-----
first add to config.php
```php
<?php
'component' => [
	'telegram' => [
        'class' => 'aki\telegram\Telegram',
        'botToken' => '123456:akiii',
    ]
]
?>
```
Once the extension is installed, simply use it in your code by  :
```php
<?= Yii::$app->telegram->senMessage([
	'chat_id' => $chat_id,
	'text' => 'test',
]); ?>
