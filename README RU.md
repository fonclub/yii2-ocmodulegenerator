# yii2-ocmodulegenerator
Yii2 Opencart Module Generator

[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.4-2196f3.svg)](https://php.net/)
[![Latest Stable Version](https://poser.pugx.org/fonclub/yii2-ocmodulegenerator/v/stable)](https://packagist.org/packages/fonclub/yii2-ocmodulegenerator)
[![Total Downloads](https://poser.pugx.org/fonclub/yii2-ocmodulegenerator/downloads)](https://packagist.org/packages/fonclub/yii2-ocmodulegenerator)
[![License](https://poser.pugx.org/fonclub/yii2-ocmodulegenerator/license)](https://packagist.org/fonclub/yii2-ocmodulegenerator)


Возможности
------------
Модуль генерирует каркас для opencart модулей

Установка
------------

Быстрая установка с ипользованием [composer](http://getcomposer.org/download/).

Запустите команду

```
php composer.phar require --prefer-dist fonclub/yii2-ocmodulegenerator "dev-master"
```

или добавьте

```
"fonclub/yii2-ocmodulegenerator": "dev-master"
```

в свой `composer.json` файл.


Использование
-----
Добавьте в свой конфиг:
```
'modules' => [
        'ocmodulegenerator' => [
            'class' => 'fonclub\ocmodulegenerator\Module',
        ],
    ],
```

Перейдите на страницу /index.php?r=ocmodulegenerator