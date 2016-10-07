Yii2 bot telegram
============
for web application yii2

Create your first bot
------------
Message @botfather https://telegram.me/botfather with the following text: /newbot If you don't know how to message by username, click the search field on your Telegram app and type @botfather, where you should be able to initiate a conversation. Be careful not to send it to the wrong contact, because some users has similar usernames to ```botfather.```
![alt tag](https://camo.githubusercontent.com/bf027eeda4a225838aac3c7e3f8b91484d358cca/687474703a2f2f692e696d6775722e636f6d2f614932366978522e706e67)

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
