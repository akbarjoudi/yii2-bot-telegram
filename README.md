bot telegram
============
for bot telegram

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require aki/yii2-bot-telegram "@dev"
```

or add

```
"aki/yii2-bot-telegram": "@dev"
```

to the require section of your `composer.json` file.


Usage
-----
frist add to config.php
```php
<?php
'component' => [
	'telegram' => [
           'class' => 'aki\telegram\Telegram',
           'botToken' => '123456:akkkkkkkkkkkkkkii',
           'botUsername' => 'PostManGoBot'
    ]

]
?>
```
Once the extension is installed, simply use it in your code by  :
```php
<?= Yii::$app->telegram->senMessage('chat_id', 'message'); ?>
