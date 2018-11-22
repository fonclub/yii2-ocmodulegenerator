<?php

namespace fonclub\ocmodulegenerator;

/**
 * Class Module
 * @author fonclub
 * @created 10.10.2018
 * @package fonclub\ocmodulegenerator
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'fonclub\ocmodulegenerator\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }
}
