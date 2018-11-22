# yii2-ocmodulegenerator
Yii2 Opencart Module Generator

[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%205.4-2196f3.svg)](https://php.net/)
[![Latest Stable Version](https://poser.pugx.org/fonclub/yii2-ocmodulegenerator/v/stable)](https://packagist.org/packages/fonclub/yii2-ocmodulegenerator)
[![Total Downloads](https://poser.pugx.org/fonclub/yii2-ocmodulegenerator/downloads)](https://packagist.org/packages/fonclub/yii2-ocmodulegenerator)
[![License](https://poser.pugx.org/fonclub/yii2-ocmodulegenerator/license)](https://packagist.org/fonclub/yii2-ocmodulegenerator)


Features
------------
The module generates a skeleton for opencart modules

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist fonclub/yii2-ocmodulegenerator "dev-master"
```

or add

```
"fonclub/yii2-ocmodulegenerator": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----
Add to config:
```
'modules' => [
        'ocmodulegenerator' => [
            'class' => 'fonclub\ocmodulegenerator\Module',
        ],
    ],
```

Go to /index.php?r=ocmodulegenerator